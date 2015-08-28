var gulp = require('gulp');
var less = require('gulp-less');
//var stylus = require('gulp-stylus');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var minifyCss = require('gulp-minify-css');
var template_cache = require('gulp-angular-templatecache');

var helpers = {
  gulp: gulp,

  templates: function buildTempaltesTask(src, dest) {
    return function() {
      return gulp.src(src)
        .pipe(template_cache({ module: 'app.templates' }))
        .pipe(gulp.dest(dest));
    }
  },

  styles: function buildStylesTask(src, dist, dest) {
    return function() {
      return gulp.src(src)
        //.pipe(stylus({ 'include css': true }))
        .pipe(less({  }))
        .pipe(concat(dist))
        .pipe(minifyCss({ noAdvanced: true }))
        .pipe(gulp.dest(dest));
    }
  },

  js: function buildJsTask(src, dist, dest) {
    return function() {
      return gulp.src(src)
        .pipe(concat(dist))
        .pipe(uglify())
        .pipe(gulp.dest(dest));
    }
  }
};

module.exports = helpers;
