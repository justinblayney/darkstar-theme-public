// see video explanation: https://youtu.be/ubHwScDfRQA

const { src, dest, watch, series} = require('gulp');
const sass = require('gulp-sass')(require('sass')); // This is different from the video since gulp-sass no longer includes a default compiler. Install sass as a dev dependency `npm i -D sass` and change this line from the video.
const prefix = require('gulp-autoprefixer');
const minify = require('gulp-clean-css');
const terser = require('gulp-terser');

//compile, prefix, and min scss
function compilescss() {
  return src('app/public/wp-content/themes/darkStarMediaTheme/src/scss/style.scss') // change to your source directory
    .pipe(sass())
    .pipe(prefix('last 2 versions'))
    .pipe(minify())
    .pipe(dest('app/public/wp-content/themes/darkStarMediaTheme/')) // change to your final/public directory
};

//compile, prefix, and min scss
function compilenoncritcalscss() {
  return src('app/public/wp-content/themes/darkStarMediaTheme/src/scss/non-critical-style.scss') // change to your source directory
    .pipe(sass())
    .pipe(prefix('last 2 versions'))
    .pipe(minify())
    .pipe(dest('app/public/wp-content/themes/darkStarMediaTheme/')) // change to your final/public directory
};


// minify js
function jsmin(){
  return src('app/public/wp-content/themes/darkStarMediaTheme/src/js/*.js') // change to your source directory
    .pipe(terser())
    .pipe(dest('app/public/wp-content/themes/darkStarMediaTheme/js/')); // change to your final/public directory
}

//watchtask
function watchTask(){
  watch('app/public/wp-content/themes/darkStarMediaTheme/src/scss/**/*.scss', compilescss); // change to your source directory
  watch('app/public/wp-content/themes/darkStarMediaTheme/src/scss/**/*.scss', compilenoncritcalscss); // change to your source directory
  watch('app/public/wp-content/themes/darkStarMediaTheme/src/js/*.js', jsmin); // change to your source directory
}


// Default Gulp task 
exports.default = series(
  compilescss,
  compilenoncritcalscss,
  jsmin,
  watchTask
);