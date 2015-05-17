var gulp = require('gulp');
var stylus = require('gulp-stylus');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var plumber = require('gulp-plumber');
var markdown = require('gulp-markdown');
var run_sequence = require('run-sequence');

function p (relative) {
	return __dirname + '/' + relative;
}

var config = {
	styles: {
		src: [
			p('./styles/main.styl')
		],

		dist: 'public.css',
		dest: p('../../public/dist')
	},

	js: {
		src: [
			p('../../bower_components/jquery/dist/jquery.js'),
			p('../../bower_components/bxslider-4/dist/jquery.bxslider.js'),
			p('../../bower_components/highlightjs/highlight.pack.js'),
			p('./js/code-tabs.js'),
			p('./js/home.js')
		],

		dist: 'public.js',
		dest: p('../../public/dist')
	}
};

gulp.task('public-md', function () {
	return gulp.src(['./docs/*.md'])
		.pipe(plumber())
		.pipe(markdown({
			highlight: function (code) {
				return require('highlight.js').highlightAuto(code).value;
			}
		}))
		.pipe(gulp.dest('dist'))
});

gulp.task('public-styles', function() {
	return gulp.src(config.styles.src)
		.pipe(stylus({ 'include css': true }))
		.pipe(concat(config.styles.dist))
		.pipe(gulp.dest(config.styles.dest));
});

gulp.task('public-js', function() {
	return gulp.src(config.js.src)
		.pipe(concat(config.js.dist))
		.pipe(gulp.dest(config.js.dest));
});

gulp.task('public-build', function() {
	return run_sequence(['public-styles'], ['public-js']);
});

gulp.task('public-watch', ['public-build'], function() {
	return gulp.watch([p('./styles/**/*.*'), p('./js/**/*.*')], ['public-build']);
});
