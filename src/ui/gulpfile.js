const gulp = require('gulp');
const sass = require('gulp-sass');

gulp.task('sass', () =>
  gulp
    .src(['./src/resources/scss/main.scss'])
    .pipe(sass({ outputStyle: 'compressed' }).on('error', sass.logError))
    .pipe(gulp.dest('./public/css'))
);
