const paths = require('./paths');
const ForkTsCheckerWebpackPlugin = require('fork-ts-checker-webpack-plugin');
const HtmlWebpackPlugin = require('html-webpack-plugin');
const ExtractTextPlugin = require('extract-text-webpack-plugin');
const CopyWebpackPlugin = require('copy-webpack-plugin');
const postCssLoader = require('./configureCssModuleLoader').postCssLoader;
const webpack = require('webpack');

const convPaths = require('convert-tsconfig-paths-to-webpack-aliases').default;
const tsconfig = require('../tsconfig.json');

const aliases = convPaths(tsconfig);

const config = {
    entry: paths.cms,
    output: {
        filename: 'cms.[hash:8].js',
        path: paths.dist,
        publicPath: '../',
    },
    resolve: {
        alias: aliases,
        extensions: ['.js', '.jsx', '.ts', '.tsx']
    },
    module: {
        rules: [{
            oneOf: [
                {
                    test: /\.module\.css$/,
                    use: ExtractTextPlugin.extract({
                        fallback: 'style-loader',
                        use: [{
                            loader: 'css-loader',
                            options: {
                                importLoaders: 1,
                                modules: true,
                                sourceMap: true,
                                localIdentName: '[name]__[local]--[hash:base64:5]',
                                minimize: true,
                                camelCase: 'dashes',
                                namedExport: true
                            }
                        }, postCssLoader]
                    })
                },
                {
                    test: /\.css$/,
                    use: ExtractTextPlugin.extract({
                        fallback: 'style-loader',
                        use: [
                            require.resolve('css-loader'),
                            postCssLoader
                        ]
                    })
                },
                {
                    test: /\.tsx?$/,
                    use: [{
                        loader: require.resolve('ts-loader'),
                        options: {
                            transpileOnly: true,
                        },
                    }, ],
                },
                {
                    loader: 'url-loader',
                    exclude: [/\.js$/, /\.html$/, /\.json$/, /\.css$/, /\.tsx?$/],
                    query: {
                        limit: 10000,
                        name: './static/[name].[hash:8].[ext]',
                    },
                },
            ]
        }]
    },
    plugins: [
        new ExtractTextPlugin('admin/styles.[hash:8].css'),
        new webpack.EnvironmentPlugin(process.env), new ForkTsCheckerWebpackPlugin({
            tslint: paths.tslint,
            tsconfig: paths.tsconfig
        }), new HtmlWebpackPlugin({
            inject: true,
            filename: './admin/index.html',
            template: paths.adminHTML
        }),
        new CopyWebpackPlugin([{
            from: paths.netlifyConfig,
            to: paths.adminDist
        }])
    ],
    devServer: {
        contentBase: paths.dist,
        port: 3000
    }
};

module.exports = config;
