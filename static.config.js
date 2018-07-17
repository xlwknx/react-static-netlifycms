const getPosts = require('./src/content/providers/getBlogPosts');
const getTags = require('./src/content/providers/getTags');
const configureCssModuleLoader = require('./config/configureCssModuleLoader');

export default {
    bundleAnalyzer: true,
    getSiteData: () => ({
        title: 'React Static with Netlify CMS',
    }),
    getRoutes: async () => {
        const posts = await getPosts();
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
