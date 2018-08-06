const path = require('path');

const paths = {
    root: process.cwd()
};

paths.src = path.resolve(paths.root, './src/');
paths.dist = path.resolve(paths.root, './dist');
paths.cms = path.resolve(paths.src, './cms.tsx');
paths.tslint = path.resolve(paths.root, 'tslint.json');
paths.tsconfig = path.resolve(paths.root, 'tsconfig.json');
paths.adminHTML = path.resolve(paths.root, './public/admin/index.html');

module.exports = paths;
