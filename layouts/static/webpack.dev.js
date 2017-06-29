const webpack = require('webpack');
const path = require('path');
const HtmlWebpackPlugin = require('html-webpack-plugin');
const ExtractTextPlugin = require('extract-text-webpack-plugin');
const HtmlStringReplace = require('html-string-replace-webpack-plugin');

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
  devtool: 'source-map',
  module: {
    rules: [
      {
        test: /\.html$/,
        loader: 'html-loader',
        options: {
          minimize: false,
          attrs: ['img:src', 'img:srcset']
        }
      },
      {
        test: /\.scss$/,
        use: ExtractTextPlugin.extract({
          fallback: 'style-loader',
          loader: 'css-loader!resolve-url-loader!sass-loader?sourceMap'
        })
      },
      {
        test: /\.(otf|ttf|eot|woff(2)?)(\?[a-z0-9=&.]+)?$/,
        loader: ['file-loader?name=assets/[name].[ext]']
      },
      {
        test: /\.(gif|jpe?g|png|svg)$/,
        loader: ['file-loader?name=assets/[name].[ext]']
      }
    ]
  },
  plugins: [
    new webpack.ProvidePlugin({
      $: "jquery",
      jQuery: "jquery",
      Carousel: "exports-loader?Carousel!bootstrap/js/dist/carousel",
      Util: "exports-loader?Util!bootstrap/js/dist/util"
    }),
    new ExtractTextPlugin({
      filename: '[name].bundle.css',
      allChunks: true
    }),
    new HtmlWebpackPlugin({
      favicon: 'src/favicon.png',
      template: 'src/index.html'
    }),
    new HtmlWebpackPlugin({
      favicon: 'src/favicon.png',
      filename: 'pricing.html',
      template: 'src/templates/pricing.html'
    }),
    new HtmlWebpackPlugin({
      favicon: 'src/favicon.png',
      filename: 'contacts.html',
      template: 'src/templates/contacts.html'
    }),
    new HtmlWebpackPlugin({
      favicon: 'src/favicon.png',
      filename: 'features.html',
      template: 'src/templates/features.html'
    }),
    new HtmlWebpackPlugin({
      favicon: 'src/favicon.png',
      filename: 'about.html',
      template: 'src/templates/about.html'
    }),
    new HtmlWebpackPlugin({
      favicon: 'src/favicon.png',
      filename: 'content.html',
      template: 'src/templates/content/content.html'
    }),
    new HtmlWebpackPlugin({
      favicon: 'src/favicon.png',
      filename: 'terms.html',
      template: 'src/templates/content/terms.html'
    }),
    new HtmlWebpackPlugin({
      favicon: 'src/favicon.png',
      filename: 'policy.html',
      template: 'src/templates/content/policy.html'
    }),
    new HtmlWebpackPlugin({
      favicon: 'src/favicon.png',
      filename: '404.html',
      template: 'src/templates/404.html'
    }),
    new HtmlStringReplace({
      enable: true,
      patterns: [
        {
          match: /srcset\s*=\s*"([^"]+)/g,
          replacement: function (match) {
            return match + ' 2x';
          }
        },
      ]
    })
  ]
};