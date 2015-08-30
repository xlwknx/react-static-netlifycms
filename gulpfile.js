var gulp = require('gulp');
//require('./front/dashboard/gulpfile');
require('./front/public-pages/gulpfile');

gulp.task('build', function () {
	gulp.run('public-build');
	//gulp.run('dashboard-build');
});

gulp.task('watch', function () {
	gulp.run('public-watch');
	//gulp.run('dashboard-watch');
});

gulp.task('default', ['watch']);
