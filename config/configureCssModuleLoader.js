const autoprefixer = require('autoprefixer');
const ExtractTextPlugin = require('extract-text-webpack-plugin');
const paths = require('./paths');

const postCssLoader = {
    loader: 'postcss-loader',
    options: {
        // Necessary for external CSS imports to work
        // https://github.com/facebookincubator/create-react-app/issues/2677
        ident: 'postcss',
        plugins: () => [
            require('postcss-retina-bg-img')({
                retinaSuffix: '@2x'
            }),
            require('postcss-flexbugs-fixes')(),
            require('postcss-import')({
                root: paths.src,
            }),
            autoprefixer({
                browsers: [
                    '>1%',
                    'last 4 versions',
                    'Firefox ESR',
                    'not ie < 9', // React doesn't support IE8 anyway
                ],
                flexbox: 'no-2009',
            }),
        ],
    },
};

module.exports.postCssLoader = postCssLoader;

module.exports.configureCssModuleLoader = (config, args) => {
    let loaders = [];
    if (args.stage === 'dev') loaders.push('style-loader');

    loaders.push({
        loader: 'css-loader',
        options: {
            importLoaders: 1,
            modules: true,
            sourceMap: true,
            localIdentName: '[name]__[local]--[hash:base64:5]',
            minimize: args.stage === 'prod',
            camelCase: 'dashes',
            namedExport: true
        }
    });

    loaders.push(postCssLoader);

    if (args.stage !== 'dev') {
        loaders = ExtractTextPlugin.extract({
            fallback: 'style-loader',
            use: loaders
        });
        config.plugins.push(new ExtractTextPlugin('styles.[hash:8].css'));
    }
    return {
        test: /\.module\.css$/,
        use: loaders
    };
}
