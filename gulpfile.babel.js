import gulp from 'gulp';
import babel from 'gulp-babel';
import browserSync from 'browser-sync';
import plumber from 'gulp-plumber';
import sass from 'gulp-sass';
import sourcemaps from 'gulp-sourcemaps';
import autoprefixer from 'gulp-autoprefixer';
import cleanCSS from 'gulp-clean-css';
import browserify from 'browserify';
import babelify from 'babelify';
import source from 'vinyl-source-stream';
import buffer from 'vinyl-buffer';
import jsmin from 'gulp-jsmin';
import imagemin from 'gulp-imagemin';

// import wpPot from 'gulp-wp-pot';
// import sort from 'gulp-sort';

const reload = browserSync.reload,
  reloadFiles = [
    './script.js',
    './style.css',
    './**/*.php'
  ],
  proxyOptions = {
    proxy: 'localhost:8080/StarterTheme/',
    notify: false
  },
  imagenminOptions = {
    progressive: true,
    optimizationLevel: 3, //van de 0 a 7
    interlaced: true,
    svgPlugins: [{removeViewBox: false}]
  }
  // wpPotOptions = {
  //   domain: 'starter', //nombre que figura en text domain de css
  //   package: 'starter', // nombre que figura en @subpackage de functions
  //   lastTranslator: 'Gabriel Zavando <gabo@gmail.com>'
  // },
  // potFile = './languages/en_US.pot'



gulp.task('server', () => browserSync.init(reloadFiles, proxyOptions))

gulp.task('css', () => {
  gulp.src('./css/style.scss')
    .pipe(sourcemaps.init({loadMaps: true}))
    .pipe(plumber())
    .pipe(sass())
    .pipe(autoprefixer({browsers: ['last 2 versions']}))
    .pipe(cleanCSS())
    .pipe(sourcemaps.write('./css/'))
    .pipe(gulp.dest('./'))
    .pipe(reload({stream: true}))
})

gulp.task('js', () => {
  browserify('./js/index.js')
    .transform(babelify)
    .bundle()
    .on('error', err => console.log(err.message))
    .pipe(source('./js/script.js'))
    .pipe(buffer())
    .pipe(sourcemaps.init({loadMaps: true}))
    .pipe(sourcemaps.write('./'))
    .pipe(jsmin())
    .pipe(gulp.dest('./'))
    .pipe(reload({stream: true}))
});

gulp.task('jsunico', () => {
  gulp.src('./js/unicos/**.js')
    .pipe(plumber())
    .on('error', err => console.log(err.message))
    .pipe(jsmin())
    .pipe(gulp.dest('./js/'))
    .pipe(reload({stream: true}))
});


gulp.task('img', () => {
  gulp.src('./img/raw/**/*.{png,jpg,jpeg,gif,svg}')
    .pipe(imagemin(imagenminOptions))
    .pipe(gulp.dest('./img/'))
});

// Tarea para generar archivo de traducción del tema
// gulp.task('translate', () => {
//   gulp.src('./**/*.php')
//     .pipe(sort())
//     .pipe(wpPot(wpPotOptions))
//     .pipe(gulp.dest(potFile))


 gulp.task('default', ['server', 'css', 'js', 'jsunico'], () => {
  gulp.watch('./css/**/*.+(scss|css)', ['css'])
  gulp.watch('./js/**/*.js', ['js'])
});
