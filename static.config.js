import {
    getBlogPosts
} from './src/content/providers/getBlogPosts';
import {
    getTags
} from './src/content/providers/getTags';
import {
    configureCssModuleLoader
} from './config/configureCssModuleLoader';

console.log('process.env.DEPLOY_PRIME_URL:', process.env.DEPLOY_PRIME_URL, '\nprocess.env.DEPLOY_URL:', process.env.DEPLOY_URL, '\nprocess.env.URL:', process.env.URL);
export default {
    siteRoot: process.env.DEPLOY_PRIME_URL,
    bundleAnalyzer: false,
    getSiteData: () => ({
        title: 'React Static with Netlify CMS',
    }),
    getRoutes: async () => {
        const posts = await getBlogPosts();
        const tags = getTags(posts);

        return [{
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
            },
            {
                path: '/blog',
                component: './src/pages/blog',
                getData: () => ({
                    posts,
                    tags
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
    webpack: (config, {
        stage,
        defaultLoaders
    }) => {
        const cssModuleLoader = configureCssModuleLoader(config, {
            stage
        });
        config.module.rules = [{
            oneOf: [
                defaultLoaders.jsLoader,
                cssModuleLoader,
                defaultLoaders.cssLoader,
                defaultLoaders.fileLoader,
            ],
        }, ];
        return config;
    },
    devServer: {
        hot: false,
    },
};
