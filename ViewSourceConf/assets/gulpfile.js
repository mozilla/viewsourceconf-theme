// Include gulp
var gulp            = require('gulp'),
    jshint          = require('gulp-jshint'),
    sass            = require('gulp-sass'),
    autoprefixer    = require('gulp-autoprefixer'),
    notify          = require('gulp-notify'),
    minifycss       = require('gulp-minify-css'),
    concat          = require('gulp-concat'),
    uglify          = require('gulp-uglify'),
    rename          = require('gulp-rename'),
    imagemin        = require('gulp-imagemin'),
    pngcrush        = require('imagemin-pngcrush'),
    browserSync     = require('browser-sync'),
    reload		    = browserSync.reload;

gulp.task('browserSync', function() {
    var files = [
        '**/*.php'
    ];

    browserSync.init(files, {
        proxy: 'viewsource.dev/'
    });

	browserSync.reload();
});

// Compile Our Sass
gulp.task('sass', function() {
    gulp.src('sass/**/*.scss')
        .pipe(sass({
            style: 'compressed',
            sourceComments: false
        })
            .on('error', notify.onError(function(error) {
                return "Error: " + error.message;
            }))
    )
        .pipe(autoprefixer({
            browsers: ['last 2 versions', 'ie >= 8']
        }))
        .pipe(gulp.dest('../'))
        .pipe(browserSync.reload({stream:true}))
        .pipe(rename({suffix: '.min'}))
        .pipe(minifycss({keepSpecialComments:0}))
        .pipe(gulp.dest('../'))
        .pipe(browserSync.reload({stream:true}))
        .pipe(notify({
            message: "Styles task complete!"
        }));
});

gulp.task('compress', function () {
    return gulp.src('images/*')
        .pipe(imagemin({
            progressive: true,
            svgoPlugins: [{removeViewBox: false}],
            use: [pngcrush()]
        }))
        .pipe(gulp.dest('../images'));
});

gulp.task('watch', function() {
    gulp.watch('sass/**/*.scss', ['sass']);
});

// Default Task
gulp.task('default', ['sass', 'compress', 'browserSync', 'watch']);