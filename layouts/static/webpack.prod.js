const webpack = require('webpack');
const path = require('path');
const HtmlWebpackPlugin = require('html-webpack-plugin');
const ExtractTextPlugin = require('extract-text-webpack-plugin');
const FaviconsWebpackPlugin = require('favicons-webpack-plugin');

module.exports = {
  entry: [
    'bootstrap-loader',
    './src/index.js',
    './src/styles/main.scss'
  ],
  output: {
    filename: '[name].bundle.js',
    path: path.resolve(__dirname, "dist")
  },
  resolve: {
    modules: [
      path.resolve('./src'),
      path.resolve('./node_modules')
    ]
  },
  module: {
    rules: [
      {
        test: /\.html$/,
        loader: 'html-loader?minimize=false'
      },
      {
        test: /\.scss$/,
        loader: ExtractTextPlugin.extract({
          fallback: 'style-loader',
          use: 'css-loader!postcss-loader!resolve-url-loader!sass-loader?sourceMap'
        })
      },
      {
        test: /\.(otf|ttf|eot|woff(2)?)(\?[a-z0-9=&.]+)?$/,
        loader: ['file-loader?name=assets/[name].[ext]']
      },
      {
        test: /\.(gif|jpe?g|png|svg)$/,
        loader: ['file-loader?name=assets/[name].[ext]', 'img-loader']
      }
    ]
  },
  plugins: [
    new webpack.ProvidePlugin({
      $: "jquery",
      jQuery: "jquery",
      Tether: "tether",
      "window.Tether": "tether",
      Carousel: "exports-loader?Carousel!bootstrap/js/dist/carousel",
      Util: "exports-loader?Util!bootstrap/js/dist/util"
    }),
    new ExtractTextPlugin({
      filename: '[name].bundle.css',
      allChunks: true
    }),
    new FaviconsWebpackPlugin({
      logo: 'favicon.png',
      prefix: 'favicons/',
      emitStats: false,
      persistentCache: false,
      inject: true,
      icons: {
        android: false,
        appleIcon: false,
        appleStartup: false,
        coast: false,
        favicons: true,
        firefox: false,
        opengraph: false,
        twitter: false,
        yandex: false,
        windows: false
      }
    }),
    new HtmlWebpackPlugin({
      template: 'src/index.html'
    }),
    new HtmlWebpackPlugin({
      filename: 'pricing.html',
      template: 'src/templates/pricing.html'
    }),
    new HtmlWebpackPlugin({
      filename: 'contacts.html',
      template: 'src/templates/contacts.html'
    }),
    new HtmlWebpackPlugin({
      filename: 'features.html',
      template: 'src/templates/features.html'
    }),
    new HtmlWebpackPlugin({
      filename: 'about.html',
      template: 'src/templates/about.html'
    }),
    new HtmlWebpackPlugin({
      filename: 'content.html',
      template: 'src/templates/content/content.html'
    }),
    new HtmlWebpackPlugin({
      filename: 'terms.html',
      template: 'src/templates/content/terms.html'
    }),
    new HtmlWebpackPlugin({
      filename: '404.html',
      template: 'src/templates/404.html'
    })
  ]
};