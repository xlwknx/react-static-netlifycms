import { getTags } from './src/content/providers/getTags';
import { configureCssModuleLoader } from './config/configureCssModuleLoader';
import { getMarkdownFiles } from './src/content/providers/getMarkdownFiles';

export default {
    // need to define static path, production and deploy url are different
    siteRoot: process.env.CONTEXT === 'production' ? process.env.URL : process.env.DEPLOY_URL,
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
                component: './src/pages/index',
            },
            {
                path: '/about',
                component: './src/pages/about',
            },
            {
                path: '/events',
                component: './src/pages/events',
                getData: () => ({
                    events,
                }),
            },
            {
                path: '/blog',
                component: './src/pages/blog',
                getData: () => ({
                    posts,
                    tags,
                }),
                children: posts.map(post => ({
                    path: `/post/${post.data.slug}`,
                    component: './src/templates/Post',
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
        defaultLoaders.cssLoader.exclude = cssModuleLoader.test;
        config.module.rules = [
            {
                oneOf: [
                    defaultLoaders.jsLoader,
                    defaultLoaders.cssLoader,
                    cssModuleLoader,
                    defaultLoaders.fileLoader,
                ],
            },
        ];
        return config;
    },
};
