var gulp = require('gulp'),
    stylus = require('gulp-stylus'),
    nib = require('nib');

var paths = {
  styls: {
    origen: './src/styles/main.styl',
    salida: './build/css/',
    ver: './src/styles/**/*'
  }
};

gulp.task('estilos', function () {
    return gulp.src(paths.styls.origen)
        .pipe(stylus({
            use: nib(),
            compress: true
        }))
        .pipe(gulp.dest(paths.styls.salida));
});
