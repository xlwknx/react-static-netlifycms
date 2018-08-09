const path = require('path');

const adminRoute = 'admin';

const paths = {
    src : path.resolve(__dirname, '../src/'),
    dist : path.resolve(__dirname, '../dist/'),
    adminDist: path.resolve(__dirname, '../dist/', adminRoute),
    cms : path.resolve(__dirname, '../src/cms/index.tsx'),
    tslint : path.resolve(__dirname, '../tslint.json'),
    tsconfig : path.resolve(__dirname, '../tsconfig.json'),
    adminHTML : path.resolve(__dirname, `../public/${adminRoute}/index.html`),
    netlifyConfig : path.resolve(__dirname, `../public/${adminRoute}/config.yml`),
};

module.exports = paths;
