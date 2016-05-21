var gulp = require('gulp'),
    stylus = require('gulp-stylus'),
    nib = require('nib'),
    browserify = require('browserify'),
    uglify= require('gulp-uglify'),
    buffer= require('vinyl-buffer'),
    source = require('vinyl-source-stream'),
    smoosher = require('gulp-smoosher');

var paths = {
  styls: {
    origen: './src/styles/main.styl',
    salida: './build/css/',
    ver: './src/styles/**/*.styl'
  },
  script: {
    origen: './src/scripts/main.js',
    salida: './build/js/',
    ver: './src/scripts/**/*.js'
  },
  scriptEmp: {
    origen: './src/scriptsEmp/main.js',
    salida: './build/js/emp/',
    ver: './src/scripts/**/*.js'
  },
  inline: {
    origen: './build/index.php',
    salida: './dist/'
  },
  inlinePhp: {
    origen: './build/php/**/*.php',
    salida: './dist/php/'
  }
};
function inline(){
  return gulp.src(paths.inline.origen)
  .pipe(smoosher())
  .pipe(gulp.dest(paths.inline.salida));
}

gulp.task('w:build:js', ['build:js'], function(){
  inline();
});
gulp.task('w:styl', ['estilos'], function(){
  inline();
});

gulp.task('watch', function(){
  gulp.watch(paths.script.ver,  { cwd: '.' }, ['w:build:js']);
  gulp.watch(paths.scriptEmp.ver, { cwd: '.' }, ['inlinePhp:php']);
  gulp.watch(paths.styls.ver, { cwd: '.' }, ['w:styl']);
});

gulp.task('build', ['estilos','build:js','inlinePhp:php'], function(){
  inline();
});

gulp.task('inlinePhp:php', ['buildEmp:js'], function(){
  return gulp.src(paths.inlinePhp.origen)
  .pipe(smoosher())
  .pipe(gulp.dest(paths.inlinePhp.salida));
});


gulp.task('build:js', function() {
  return browserify(paths.script.origen)
    .bundle()
    .pipe(source('bundle.js'))
    .pipe(buffer())
    .pipe(uglify())
    .pipe(gulp.dest(paths.script.salida));
});

gulp.task('buildEmp:js', function() {
  return browserify(paths.scriptEmp.origen)
    .bundle()
    .pipe(source('bundle.js'))
    .pipe(gulp.dest(paths.scriptEmp.salida));
});

gulp.task('estilos', function () {
    return gulp.src(paths.styls.origen)
        .pipe(stylus({
            use: nib(),
            compress: true
        }))
        .pipe(gulp.dest(paths.styls.salida));
});

gulp.task('default',['build', 'watch']);
