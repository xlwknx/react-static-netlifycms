const path = require('path');

const paths = {
    root: process.cwd()
};

paths.src = path.resolve(paths.root, './src/');
paths.cms = path.resolve(paths.src, './cms.tsx');

module.exports = paths;
