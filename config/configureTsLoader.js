const convPaths = require('convert-tsconfig-paths-to-webpack-aliases').default;
const appPath = require('./appPath');
const path = require('path');

module.exports = function configureTsLoader(config) {
  const tsLoader = {
    test: /\.(js|jsx|ts|tsx)$/,
    exclude: /node_modules\/(?!netlify-cms)/, // as std jsLoader exclude,
    use: [{
        loader: 'babel-loader'
      },
      {
        loader: require.resolve('ts-loader'),
        options: {
          transpileOnly: true,
        },
      },
    ],
  };

  const tsconfig = require('../tsconfig.json');

  const aliases = convPaths(tsconfig);
  config.resolve.alias = aliases;
  config.resolve.extensions.push('.ts', '.tsx');
  console.log("path.resolve(__dirname, '/node_modules/netlify-cms/src/')", path.resolve(appPath, '../node_modules/netlify-cms/src/'));
  config.resolve.modules.push(path.resolve(appPath, '../node_modules/netlify-cms/src/'));

  return tsLoader;
};
