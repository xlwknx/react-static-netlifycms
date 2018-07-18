import { getBlogPosts } from './src/content/providers/getBlogPosts';
import { getTags } from './src/content/providers/getTags';
import { configureCssModuleLoader } from './config/configureCssModuleLoader';

export default {
    bundleAnalyzer: false,
    getSiteData: () => ({
        title: 'React Static with Netlify CMS',
    }),
    getRoutes: async () => {
        const posts = await getBlogPosts();
        const tags = getTags(posts);

        return [{
            path: '/blog',
            getData: () => ({
                posts,
                tags
            }),
            children: posts.map(post => ({
                path: `/post/${post.data.slug}`,
                component: 'src/containers/Post',
                getData: () => ({
                    post,
                }),
            })),
        }, ];
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
