const { src, dest, series, watch } = require( 'gulp' );

const cssNano = require( 'gulp-cssnano' );
const sass    = require( 'gulp-sass' )( require( 'sass' ) );
const rename  = require( 'gulp-rename' );

function cssDev(cb) {
	return src( 'resources/scss/*.scss' )
		.pipe( sass( {
			indentType: "tab",
			indentWidth: 1
		} ) )
		.pipe( rename( { extname: '.css' } ) )
		.pipe( dest( 'public/css/' ) );
}

function cssStylesDev(cb) {
	return src( 'resources/scss/styles/*.scss' )
	      .pipe( sass() )
	      .pipe( rename( { extname: '.css' } ) )
	      .pipe( dest( 'public/css/styles/' ) );
}

function cssProd(cb) {
	return src( 'resources/scss/*.scss' )
	      .pipe( sass() )
	      .pipe( cssNano() )
	      .pipe( rename( { extname: '.css' } ) )
	      .pipe( dest( 'public/css/' ) );
}

exports.dev  = series( cssDev  );
exports.prod = series( cssProd );

exports.watch = function() {
	watch( 'resources/scss/**/*.scss', series( cssDev, cssStylesDev ) );
}
