// ==== IMAGES ==== //

var gulp        = require( 'gulp' ),
    plugins     = require( 'gulp-load-plugins' )({ camelize: true }),
    config      = require( '../../gulpconfig' ).images;

    // Optimize images.
    gulp.task( 'images', function() {
      return gulp.src( config.src )
      .pipe(plugins.responsive(config.responsive))
      .pipe( plugins.imagemin( config.imagemin ) )
      .pipe( gulp.dest( config.dest ) );
    });
