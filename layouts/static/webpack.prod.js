const path = require('path');
const HtmlWebpackPlugin = require('html-webpack-plugin');
const ExtractTextPlugin = require('extract-text-webpack-plugin');

module.exports = {
  entry: [
    './src/index.js',
    './src/styles/main.scss'
  ],
  output: {
    filename: '[name].bundle.js',
    path: path.resolve(__dirname, "dist")
  },
  module: {
    rules: [
      {
        test: /\.html$/,
        loader: 'html-loader?minimize=false'
      },
      {
        test: /\.scss$/,
        loader: ExtractTextPlugin.extract(['css-loader', 'postcss-loader', 'resolve-url-loader', 'sass-loader?sourceMap'])
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
    new HtmlWebpackPlugin({
      hash: true,
      template: 'src/index.html'
    }),
    new HtmlWebpackPlugin({
      hash: true,
      filename: 'pricing.html',
      template: 'src/templates/pricing.html'
    }),
    new HtmlWebpackPlugin({
      hash: true,
      filename: 'contacts.html',
      template: 'src/templates/contacts.html'
    }),
    new HtmlWebpackPlugin({
      hash: true,
      filename: 'features.html',
      template: 'src/templates/features.html'
    }),
    new HtmlWebpackPlugin({
      hash: true,
      filename: 'about.html',
      template: 'src/templates/about.html'
    }),
    new HtmlWebpackPlugin({
      hash: true,
      filename: 'content.html',
      template: 'src/templates/content/content.html'
    }),
    new HtmlWebpackPlugin({
      hash: true,
      filename: 'terms.html',
      template: 'src/templates/content/terms.html'
    }),
    new ExtractTextPlugin({
      filename: '[name].bundle.css',
      allChunks: true
    })
  ]
};