import 'babel-core/external-helpers';

import gulp from 'gulp';
import gulpUtil from 'gulp-util';
import gulpSize from 'gulp-size';
import gulpChanged from 'gulp-changed';
import gulpReplace from 'gulp-replace';
import gulpPlumber from 'gulp-plumber';
import gulpNotify from 'gulp-notify';
import gulpIf from 'gulp-if';
import gulpStylus from 'gulp-stylus';
import gulpAutoprefixer from 'gulp-autoprefixer';
import gulpInlineBase64 from 'gulp-inline-base64';
import yargs from 'yargs';
import runSequence from 'run-sequence';
import webpack  from 'webpack';
import vinylNamed from 'vinyl-named';
import webpackStream from 'webpack-stream';
import browserSync from 'browser-sync';
import path, { join as pathJoin } from 'path';

let browserSyncInst = browserSync.create();

function handleError(...args) {
  gulpNotify.onError({ title: 'COMPILE ERROR:', message: '<%= error %>' })(...args);
  this.emit('end');
}

const ARGV = yargs.argv;
const IS_WATCH = !!ARGV.watch;
const IS_MINIFY = ARGV.minify;
const IS_LIVE = ARGV.live;

const DIST_PATH = pathJoin(__dirname, 'dist');
const DIST_PATH_LIVE = path.resolve(__dirname, '../_themes/virgil');
const SRC_PATH = pathJoin(__dirname);
const ASSETS_PATH = pathJoin(SRC_PATH, 'assets');
const STYLES_PATH = pathJoin(ASSETS_PATH, 'styles');
const IMAGES_PATH = pathJoin(ASSETS_PATH, 'images');

const GLOB_HTML = pathJoin(SRC_PATH, '*.html');
const GLOB_STYLES = pathJoin(STYLES_PATH, 'virgil.styl');
const GLOB_IMAGES = pathJoin(IMAGES_PATH, '**/*.*');

// HTML
gulp.task('html', (cb) => {
  let tasks = ['html:compile'];

  if (IS_WATCH) {
    tasks.push('html:watch');
  }

  runSequence(tasks, cb);
});

gulp.task('html:compile', () => {
  return gulp.src(GLOB_HTML)
  .pipe(gulpChanged(DIST_PATH))
  .pipe(gulp.dest(DIST_PATH))
  .pipe(gulpSize({ title: 'html' }));
});

gulp.task('html:watch', (cb) => {
  gulp.watch(GLOB_HTML, ['html:compile']).on('change', browserSyncInst.reload);
  cb();
});

// STYLES
gulp.task('styles', (cb) => {
  let tasks = ['styles:compile'];

  if (IS_WATCH) {
    tasks.push('styles:watch');
  }

  runSequence(tasks, cb);
});

gulp.task('styles:compile', () => {
  let distPath = IS_LIVE ? pathJoin(DIST_PATH_LIVE, 'css') : pathJoin(DIST_PATH, 'css');

  return gulp.src(GLOB_STYLES)
  .pipe(gulpChanged(DIST_PATH))
  .pipe(gulpPlumber(handleError))
  .pipe(gulpStylus({ 'include css': true, compress: IS_MINIFY }))
  .pipe(gulpAutoprefixer({
    browsers: ['Android >= 4', 'iOS >= 7', 'ChromeAndroid >= 4', 'ExplorerMobile >= 9'],
    cascade: false
  }))
  .pipe(gulpInlineBase64({
    baseDir: STYLES_PATH + '/',
    maxSize: 300 * 1024,
    debug: true
  }))
  .pipe(gulpPlumber.stop())
  .pipe(gulp.dest(pathJoin(DIST_PATH, 'css')))
  .pipe(gulp.dest(pathJoin(DIST_PATH_LIVE, 'css')))
  .pipe(gulpSize({ title: 'styles' }));
});

gulp.task('styles:watch', (cb) => {
  gulp.watch(pathJoin(STYLES_PATH, '**/*.*'), ['styles:compile']).on('change', browserSyncInst.reload);
  cb();
});

// IMAGES
gulp.task('images', (cb) => {
  let tasks = ['images:compile'];

  if (IS_WATCH) {
    tasks.push('images:watch');
  }

  runSequence(tasks, cb);
});

gulp.task('images:compile', () => {
  return gulp.src(GLOB_IMAGES)
  .pipe(gulpChanged(DIST_PATH))
  .pipe(gulp.dest(pathJoin(DIST_PATH, 'images')))
  .pipe(gulp.dest(pathJoin(DIST_PATH_LIVE, 'img')))
  .pipe(gulpSize({ title: 'images' }));
});

gulp.task('images:watch', (cb) => {
  gulp.watch(GLOB_IMAGES, ['images:compile']).on('change', browserSyncInst.reload);
  cb();
});

// JS
const webpackConfig = {
  entry: pathJoin(SRC_PATH, 'js/virgil'),

  output: {
    path: DIST_PATH,
    filename: 'virgil.js'
  },

  cache: true,
  debug: false,
  watch: IS_WATCH,

  stats: {
    reasons: true,
    colors: gulpUtil.colors.supportsColor,
    hash: true,
    version: true,
    timings: true,
    chunks: true,
    chunkModules: true,
    cached: true,
    cachedAssets: true
  },

  plugins: (() => {
    let plugins = [];

    plugins.push(new webpack.ProvidePlugin({
      $: "jquery",
      jQuery: "jquery"
    }));

    plugins.push(new webpack.optimize.OccurenceOrderPlugin(true));

    if (IS_WATCH) {
      plugins.push(new webpack.WatchIgnorePlugin([
        /node_modules|bower_components/i
      ]));
    }

    if (IS_MINIFY) {
      plugins.push(new webpack.optimize.DedupePlugin());
      plugins.push(new webpack.optimize.UglifyJsPlugin({ output: { comments: false } }));
      plugins.push(new webpack.optimize.AggressiveMergingPlugin());
    }

    return plugins;
  })(),

  module: {
    loaders: [
      {
        test: /\.jsx?$/,
        exclude: /node_modules|bower_components/i,
        // use runtime to optimize the code, but it make sense when you have a lot of ES6 files
        loader: 'babel-loader'
      }
    ]
  }
};

gulp.task('bundle', (cb) => {
  let bundlerStartCount = 0;
  gulp.src(webpackConfig.entry)
  .pipe(vinylNamed())
  .pipe(gulpPlumber(handleError))
  .pipe(webpackStream(webpackConfig, webpack, (error, stats) => {
    if (error) {
      throw new gulpUtil.PluginError('[webpack-bundle]', error);
    }

    gulpUtil.log(`[webpack-stats]\n${stats.toString(webpackConfig.stats)}`);

    if (++bundlerStartCount === 1) {
      browserSyncInst.reload();
      return cb();
    }
  }))
  .pipe(gulpPlumber.stop())
  .pipe(gulp.dest(pathJoin(DIST_PATH, 'js')))
  .pipe(gulp.dest(pathJoin(DIST_PATH_LIVE, 'js')));
});

gulp.task('build', (cb) => {
  runSequence(['styles', 'images', 'html'], ['bundle'], cb);
});

gulp.task('sync', (cb) => {

  browserSyncInst.init({
    server: DIST_PATH
  });

  runSequence(['styles', 'images', 'html'], ['bundle'], cb);
});

gulp.task('default', ['sync']);
