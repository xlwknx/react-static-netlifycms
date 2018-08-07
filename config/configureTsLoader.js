import ForkTsCheckerWebpackPlugin from 'fork-ts-checker-webpack-plugin';
import paths from './paths';

const convPaths = require('convert-tsconfig-paths-to-webpack-aliases').default;

export function configureTsLoader(config, {
    defaultLoaders
}) {
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
    config.plugins.push(new ForkTsCheckerWebpackPlugin({
        tslint: paths.tsconfig,
        tsconfig: paths.tslint
    }));
    config.resolve.symlinks = false;

    return tsLoader;
};
