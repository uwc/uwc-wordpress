// ==== THEME ==== //

var gulp        = require( 'gulp' ),
    gutil       = require( 'gulp-util' ),
    wppot       = require( 'gulp-wp-pot' ),
    plugins     = require('gulp-load-plugins')({ camelize: true }),
    config      = require('../../gulpconfig').theme;

// Copy Advanced Custom Fields PRO files to the `build` folder
gulp.task('theme-acf', function() {
  return gulp.src(config.acf.src)
  .pipe(plugins.changed(config.acf.dest))
  .pipe(gulp.dest(config.acf.dest));
});

// Copy readme file to the `build` folder
gulp.task('theme-meta', function() {
  return gulp.src(config.meta.src)
  .pipe(plugins.changed(config.meta.dest))
  .pipe(gulp.dest(config.meta.dest));
});

// Copy custom font files to the `build` folder
gulp.task('theme-fonts', function() {
  return gulp.src(config.fonts.src)
  .pipe(plugins.changed(config.fonts.dest))
  .pipe(gulp.dest(config.fonts.dest));
});

// Lint theme php files with phpcbf, then copy to the `build` folder
gulp.task('theme-php', function () {
  return gulp.src(config.php.src)
  .pipe(plugins.phpcbf({
    bin: config.php.bin,
    standard: config.php.standard,
    warningSeverity: config.php.warningSeverity
  }))
  .on('error', gutil.log)
  .pipe(gulp.dest(config.php.dest));
});

// Update language template file with latest strings
gulp.task('languages', function () {
  return gulp.src(config.php.src)
    .pipe(plugins.sort())
    .pipe(wppot( {
      domain: config.lang.domain,
      destFile: config.lang.domain+'.pot',
      package: config.lang.domain,
      bugReport: 'https://github.com/uwc/'+config.lang.domain+'-wordpress/issues',
      lastTranslator: 'Connor Bär <hello@connorbaer.io>',
      team: 'Made by Connor. <hello@madebyconnor.io>'
    } ))
    .pipe(gulp.dest(config.lang.languages));
});

// Copy everything under `src/languages` indiscriminately
gulp.task('theme-lang', ['languages'], function() {
  return gulp.src(config.lang.src)
  .pipe(plugins.changed(config.lang.dest))
  .pipe(gulp.dest(config.lang.dest));
});


// All the theme tasks in one
gulp.task('theme', ['theme-lang', 'theme-php', 'theme-fonts', 'theme-meta', 'theme-acf']);