const gulp = require('gulp');
const plumber = require('gulp-plumber');
const minify = require('gulp-csso');
const uglify = require('gulp-uglify');

gulp.task('message', function (done) {
  console.log('Минификация завершена');
  done();
});

gulp.task('js', function () {
  return gulp.src('js/*.js')
    .pipe(plumber())
    .pipe(uglify())
    .pipe(gulp.dest('js/min'));
});


gulp.task('css', function () {
  return gulp.src('mdbcss/*.css')
    .pipe(plumber())
    .pipe(minify())
    .pipe(gulp.dest('mdbcss/min'));
});

gulp.task('assets',
  gulp.series(gulp.parallel('css', 'js'), 'message')
);
