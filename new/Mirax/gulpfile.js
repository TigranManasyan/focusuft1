var gulp           = require('gulp'),
	gutil          = require('gulp-util' ),
	sass           = require('gulp-sass'),
	browserSync    = require('browser-sync'),
	concat         = require('gulp-concat'),
	uglify         = require('gulp-uglify'),
	cleanCSS       = require('gulp-clean-css'),
	rename         = require('gulp-rename'),
	del            = require('del'),
	imagemin       = require('gulp-imagemin'),
	cache          = require('gulp-cache'),
	autoprefixer   = require('gulp-autoprefixer'),
	ftp            = require('vinyl-ftp'),
	notify         = require("gulp-notify"),
	rsync          = require('gulp-rsync'),
	scss 		   = require("gulp-scss"),
    svgSprite 	   = require('gulp-svg-sprite'),
    svgmin 		   = require('gulp-svgmin'),
    replace 	   = require('gulp-replace'),
    cheerio 	   = require('gulp-cheerio'),
	pug 		   = require('gulp-pug'),
    gcmq           = require('gulp-group-css-media-queries');




gulp.task('pug', function buildHTML() {
    return gulp.src('app/pug/page/**/*.pug')
        .pipe(pug({
            pretty: true
        }))
        .pipe(gulp.dest('app'));
});

gulp.task('svg', function() {
    return gulp.src('app/static/img/svg/*.svg')
        .pipe(svgSprite({
            mode: {
                symbol: {
                    sprite: "sprite.svg"
                },
                css: {			// Create a «css» sprite
                	render: {
                		scss: true		// Render a Sass stylesheet
                    },
                    layout: 'horizontal'
                }
            }
        }))
        .pipe(gulp.dest('dist/static/img/svg/'));
});

gulp.task('common-js', function() {
	return gulp.src([
		'app/js/common.js',
		])
	.pipe(concat('common.min.js'))
	// .pipe(uglify())
	.pipe(gulp.dest('app/js'));
});

gulp.task('js', ['common-js'], function() {
	return gulp.src([
		// 'app/libs/jquery/dist/jquery.min.js',
		'app/libs/mCustomScrollbar/js/jquery.mCustomScrollbar.js',
        'app/libs/owl_carousel_2/owl.carousel.js',
        'app/libs/mCustomScrollbar/js/jquery.mCustomScrollbar.js',
        'app/libs/isotope/isotope.pkgd.min.js',
        'app/libs/magnific-popup/jquery.magnific-popup.js',
        'app/libs/map/gmap3.min.js',
        'app/libs/rotate-circle/rotate-circle.js',
        'app/libs/wow/wow.min.js',
        'app/libs/YTPlayer/jquery.mb.YTPlayer.min.js',
        'app/libs/sliphover/jquery.sliphover.min.js',
        'app/libs/particleground/jquery.particleground.min.js',
        'app/libs/sticky-sidebar/jquery.sticky-sidebar.min.js',
		'app/js/main.js',
		'app/pug/**/**/**/index.js'
		])
	.pipe(concat('scripts.min.js'))
	// .pipe(uglify())
	.pipe(gulp.dest('app/js'))
	.pipe(browserSync.reload({stream: true}));
});

gulp.task('browser-sync', function() {
	browserSync({
		server: {
			baseDir: 'app'
		},
		notify: false,
	});
});

gulp.task('sass', function() {
	return gulp.src('app/sass/**/*.scss')
	.pipe(sass({outputStyle: 'expand'}).on("error", notify.onError()))
	.pipe(rename({suffix: '.min', prefix : ''}))
	.pipe(autoprefixer(['last 15 versions']))
    .pipe(gcmq())
	// .pipe(cleanCSS())
	.pipe(gulp.dest('app/css'))
	.pipe(browserSync.reload({stream: true}));
});

gulp.task('watch', ['pug','sass', 'js', 'browser-sync'], function() {
	gulp.watch(['app/pug/**/**/*.pug'], ['pug']);
	gulp.watch(['app/sass/**/*.scss','app/pug/**/**/*.scss'], ['sass']);
	gulp.watch(['app/js/*.js','libs/**/**/*.js', 'app/pug/**/**/index.js'], ['js']);
	gulp.watch('app/*.html', browserSync.reload);
});

gulp.task('imagemin', function() {
	return gulp.src('app/img/**/*')
	.pipe(cache(imagemin()))
	.pipe(gulp.dest('dist/img'));
});

gulp.task('build', ['removedist', 'imagemin', 'sass', 'js'], function() {

	var buildFiles = gulp.src([
		'app/*.html',
		'app/.htaccess',
		]).pipe(gulp.dest('dist'));

	var buildCss = gulp.src([
		'app/css/main.min.css',
		]).pipe(gulp.dest('dist/css'));

	var buildJs = gulp.src([
		'app/js/**.js',
		]).pipe(gulp.dest('dist/js'));

	var buildFonts = gulp.src([
		'app/fonts/**/*',
		]).pipe(gulp.dest('dist/fonts'));

    var buildFonts = gulp.src([
        'app/php/**/*',
    ]).pipe(gulp.dest('dist/php'));

});

gulp.task('deploy', function() {

	var conn = ftp.create({
		host:      'hostname.com',
		user:      'username',
		password:  'userpassword',
		parallel:  10,
		log: gutil.log
	});

	var globs = [
	'dist/**',
	'dist/.htaccess',
	];
	return gulp.src(globs, {buffer: false})
	.pipe(conn.dest('/path/to/folder/on/server'));

});

gulp.task('rsync', function() {
	return gulp.src('dist/**')
	.pipe(rsync({
		root: 'dist/',
		hostname: 'username@yousite.com',
		destination: 'yousite/public_html/',
		archive: true,
		silent: false,
		compress: true
	}));
});

gulp.task('removedist', function() { return del.sync('dist'); });
gulp.task('clearcache', function () { return cache.clearAll(); });
gulp.task('default', ['watch']);












// Build for WordPress

gulp.task('wp-sass', function() {
    return gulp.src(
        ['app/sass/wp-main.scss']
    )
        .pipe(sass({outputStyle: 'expand'}).on("error", notify.onError()))
        .pipe(rename({basename: 'main', suffix: '.min', prefix : ''}))
        .pipe(autoprefixer(['last 15 versions']))
        .pipe(gcmq())
        // .pipe(cleanCSS())
        .pipe(gulp.dest('wp/css'))
        .pipe(browserSync.reload({stream: true}));
});

gulp.task('wp-sass_app', function() {
    return gulp.src('app/pug/components/**/index.scss')
        .pipe(sass({outputStyle: 'expand'}).on("error", notify.onError()))
        .pipe(autoprefixer(['last 15 versions']))
        .pipe(gcmq())
        // .pipe(cleanCSS())
        .pipe(gulp.dest('wp/blocks'))
});

gulp.task('wp-js', function() {
    return gulp.src([
        'app/pug/components/**/index.js',
    ])
    // .pipe(concat('common.min.js'))
    // .pipe(uglify())
	.pipe(gulp.dest('wp/blocks'));
});


gulp.task('wp-pug', function buildHTML() {
    return gulp.src('app/pug/components/**/index.pug')
        .pipe(pug({
            pretty: true
        }))
        .pipe(gulp.dest('wp/blocks'));
});


gulp.task('wp-build', ['wp-sass', 'wp-sass_app', 'wp-js', 'wp-pug'], function() {
    gulp.src([
        'app/static/fonts/**/*',
    ]).pipe(gulp.dest('wp/fonts'));
});