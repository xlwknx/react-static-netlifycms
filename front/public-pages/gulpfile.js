var helpers = require('../../gulp-helpers');
var gulp = helpers.gulp;
var plumber = require('gulp-plumber');
var markdown = require('gulp-markdown');
var run_sequence = require('run-sequence');

function p (relative) {
	return __dirname + '/' + relative;
}

var config = {
	styles: {
		src: [
			p('./styles/main.less')
		],

		dist: 'public.css',
		dest: p('../../public/dist')
	},

	js: {
		src: [
			p('../../bower_components/jquery/dist/jquery.js'),
			p('../../bower_components/hash-tabs/dist/jquery.hash-tabs.js'),
			p('../../bower_components/bxslider-4/dist/jquery.bxslider.js'),
			p('../../bower_components/highlightjs/highlight.pack.js'),
			p('../../bower_components/bootstrap-less/js/collapse.js'),
			p('../../bower_components/bootstrap-less/js/transition.js'),
			p('./js/code-tabs.js'),
			p('./js/home.js')
		],

		dist: 'public.js',
		dest: p('../../public/dist')
	}
};

gulp.task('public-md', function () {
	return gulp.src([p('./docs/*.md')])
		.pipe(plumber())
		.pipe(markdown({
			highlight: function (code) {
				return require('highlight.js').highlightAuto(code).value;
			}
		}))
		.pipe(gulp.dest(p('./docs')))
});

gulp.task('public-styles', helpers.styles(config.styles.src, config.styles.dist, config.styles.dest));
gulp.task('public-js',     helpers.js(config.js.src, config.js.dist, config.js.dest));

gulp.task('public-build', function() {
	return run_sequence(['public-styles'], ['public-js']);
});

gulp.task('public-watch', ['public-build'], function() {
	return gulp.watch([p('./styles/**/*.*'), p('./js/**/*.*')], ['public-build']);
});
