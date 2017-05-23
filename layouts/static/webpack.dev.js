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
        loader: 'html-loader'
      },
      {
        test: /\.scss$/,
        loader: ExtractTextPlugin.extract(['css-loader', 'resolve-url-loader', 'sass-loader?sourceMap'])
      },
      {
        test: /\.(otf|gif|jpe?g|png|ttf|eot|svg|woff(2)?)(\?[a-z0-9=&.]+)?$/,
        loader: ['file-loader?name=assets/[name].[ext]']
        //loader: ['base64-inline-loader?limit=1000&name=assets/[name].[ext]']
      }
    ]
  },
  plugins: [
    new HtmlWebpackPlugin({
      // hash: true,
      // filename: 'index.html',
      // template: __dirname + '/src/index.html'
      template: 'src/index.html'
    }),
    new HtmlWebpackPlugin({
      filename: 'pricing.html',
      template: 'src/templates/pricing.html'
    }),
    new ExtractTextPlugin({
      filename: '[name].bundle.css',
      allChunks: true
    })
  ]
};