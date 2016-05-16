var gulp = require('gulp'),
    stylus = require('gulp-stylus'),
    nib = require('nib'),
    browserify = require('browserify'),
    uglify=require('gulp-uglify'),
    buffer=require('vinyl-buffer'),
    source = require('vinyl-source-stream'),
    smoosher = require('gulp-smoosher');

var paths = {
  styls: {
    origen: './src/styles/main.styl',
    salida: './build/css/',
    ver: './src/styles/**/*'
  },
  script: {
    origen: './src/scripts/main.js',
    salida: './build/js/',
    ver: './src/scripts/**/*'
  },
  scriptEmp: {
    origen: './src/scriptsEmp/main.js',
    salida: './build/js/emp/',
    ver: './src/scripts/**/*'
  },
  inline: {
    origen: './build/index.php',
    salida: './dist/',
    ver: './build/index.php'
  },
  inlinePhp: {
    origen: './build/php/**/*.php',
    salida: './dist/php/',
    ver: './build/**/*.php'
  }
};

gulp.task('inline:php',['estilos','build:js','buildEmp:js'], function(){
  return gulp.src(paths.inline.origen)
  .pipe(smoosher())
  .pipe(gulp.dest(paths.inline.salida));
});

gulp.task('inlinePhp:php',['estilos','build:js','buildEmp:js'], function(){
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

gulp.task('default',['inline:php','inlinePhp:php']);
