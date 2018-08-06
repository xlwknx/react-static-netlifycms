const path = require('path');
const paths = require('./config/paths');
const ForkTsCheckerWebpackPlugin = require('fork-ts-checker-webpack-plugin');
const HtmlWebpackPlugin = require('html-webpack-plugin');
const ExtractTextPlugin = require('extract-text-webpack-plugin');
const ChunkManifestPlugin = require('chunk-manifest-webpack-plugin');

const autoprefixer = require('autoprefixer');
const webpack = require('webpack');

const convPaths = require('convert-tsconfig-paths-to-webpack-aliases').default;
const tsconfig = require('./tsconfig.json');

const aliases = convPaths(tsconfig);
let cssPath = 'yo';
const config = {
    entry: './src/cms.tsx',
    output: {
        filename: '[name].bundle.js',
        path: path.resolve(__dirname, 'dist')
    },
    resolve: {
        alias: aliases,
        extensions: ['.js', '.jsx', '.ts', '.tsx']
    },
    module: {
        rules: [

            {

                test: /\.css$/,
                oneOf: [{
                        resourceQuery: /^\?raw$/,
                        use: ExtractTextPlugin.extract({
                            fallback: 'style-loader',
                            use: [
                                require.resolve('css-loader')
                            ]
                        })
                    },
                    {
                        use: ExtractTextPlugin.extract({
                            fallback: 'style-loader',
                            use: [{
                                loader: 'css-loader',
                                options: {
                                    importLoaders: 1,
                                    modules: true,
                                    sourceMap: true,
                                    localIdentName: '[name]__[local]--[hash:base64:5]',
                                    minimize: false,
                                    camelCase: 'dashes',
                                    namedExport: true
                                }
                            }, {
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
                            }]
                        })
                    }
                ]


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
                exclude: [/\.js$/, /\.html$/, /\.json$/],
                query: {
                  limit: 10000,
                  name: 'static/[name].[hash:8].[ext]',
                },
            }

        ]
    },
    plugins: [
        new ExtractTextPlugin({
            filename: (getPath) => {
                cssPath = getPath('preview-styles.[hash:6].css');
                return cssPath;
            }
        }),
        new ChunkManifestPlugin({
            filename: 'manifest.json',
            manifestVariable: 'webpackManifest',
            inlineManifest: true
        }),
        new webpack.EnvironmentPlugin({
            cssPath
        }), new ForkTsCheckerWebpackPlugin({
            tslint: './tslint.json',
            tsconfig: './tsconfig.json'
        }), new HtmlWebpackPlugin({
            inject: true,
            filename: './admin/index.html',
            template: path.join(__dirname, 'public', 'admin', 'index.html')
        })
    ]
}

module.exports = config;
