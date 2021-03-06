import path from 'path';
import { getTags } from './src/content/providers/getTags';
import { configureCssModuleLoader } from './config/configureCssModuleLoader';
import { configureTsLoader } from './config/configureTsLoader';
import { getMarkdownFiles } from './src/content/providers/getMarkdownFiles';

console.log(
    'process.env.CONTEXT', process.env.CONTEXT,
    '\nprocess.env.URL', process.env.URL,
    '\nprocess.env.DEPLOY_URL', process.env.DEPLOY_URL,
    '\nprocess.env.DEPLOY_PRIME_URL', process.env.DEPLOY_PRIME_URL,
);

export default {
    // need to define static path, production and deploy url are different
    siteRoot: process.env.CONTEXT === 'production' ? process.env.URL : process.env.DEPLOY_URL,
    disableRoutePrefixing: true,
    basePath: './',
    entry: path.join(__dirname, 'src', 'index.tsx'),
    bundleAnalyzer: false,
    getSiteData: () => ({
        title: 'React Static with Netlify CMS',
    }),
    getRoutes: async () => {
        const [posts, events] = await Promise.all([
            getMarkdownFiles('posts'),
            getMarkdownFiles('events'),
        ]);
        const tags = getTags(posts);
        return [
            {
                path: '/',
                component: './src/pages/main/MainPage',
            },
            {
                path: '/about',
                component: './src/pages/about/AboutPage',
            },
            {
                path: '/events',
                component: './src/pages/events/EventsPage',
                getData: () => ({
                    events,
                }),
            },
            {
                path: '/blog',
                component: './src/pages/blog/BlogPage',
                getData: () => ({
                    posts,
                    tags,
                }),
                children: posts.map(post => ({
                    path: `/post/${post.data.slug}`,
                    component: './src/pages/blog/PostPage',
                    getData: () => ({
                        post,
                    }),
                })),
            },
        ];
    },
    webpack: (config, { stage, defaultLoaders }) => {
        const cssModuleLoader = configureCssModuleLoader(config, {
            stage,
        });
        const tsLoader = configureTsLoader(config, { defaultLoaders });
        defaultLoaders.cssLoader.exclude = cssModuleLoader.test;
        config.module.rules = [
            {
                oneOf: [
                    defaultLoaders.jsLoader,
                    tsLoader,
                    defaultLoaders.cssLoader,
                    cssModuleLoader,
                    defaultLoaders.fileLoader,
                ],
            },
        ];
        return config;
    },
};
