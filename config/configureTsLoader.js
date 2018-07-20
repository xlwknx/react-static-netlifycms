const convPaths = require('convert-tsconfig-paths-to-webpack-aliases').default;

export function configureTsLoader(config, { defaultLoaders }) {
  const tsLoader = {
    test: /\.(ts|tsx)$/,
    exclude: defaultLoaders.jsLoader.exclude, // as std jsLoader exclude,
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

  return tsLoader;
};
