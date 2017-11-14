function getMessage() {
    var messages = [
        'I love you',
        'You\'re awesome',
        'Like a boss',
        'Kick ass',
        'This is why you make the big bucks',
        'Perfectly placed semicolons chief',
        'Wow. Nice bro',
        'You must do this a lot',
        'Such wow',
        'Get to the choppah!',
        'Pretty sweeeeet',
        'This better work',
        'Let\'s get foods',
        'You\'re my favorite dev',
        'No errors... Let\'ts just hope you\'re targeting the right thing',
        'Cowabunga',
        'Bangarang',
        'The important thing is that you are safe',
        'Ain\'t nobody got time for that'
    ];

    var message = messages[ Math.floor( Math.random() * messages.length) ];
    return '😍  ' + message;
}

module.exports = function (grunt) {

    grunt.initConfig({

        pkg: grunt.file.readJSON('package.json'),

        // Create JS Library w/ Bower
        // -----------------------------------
        concat: {
            dev: {
                src: [
                    'bower_components/jquery/dist/jquery.min.js',
                    'bower_components/wow/dist/wow.min.js',
                    'bower_components/slick-carousel/slick/slick.min.js'

                ],
                dest: 'dest/js/lib.min.js'
            }
        },

        // Javascript QA
        // -----------------------------------
        jshint: {
            files: [
                'dest/js/app.js'
            ],
            options: {
                expr: true,
                globals: {
                    jQuery: true,
                    console: true,
                    module: true,
                    document: true
                }
            }
        },

        // Minify Files
        // -----------------------------------
        uglify: {
            dev: {
                options: {
                    beautify: true,
                    compress: true,
                    mangle: false
                },
                files: {
                    'dest/js/app.min.js': [
                        'src/js/*.js',
                        'src/js/**/*.js',
                        'includes/modules/**/*.js',
                    ]
                }
            }
        },

        // Compile Sass
        // -----------------------------------
        sass: {
            options: {
                require: 'susy',
                sourceMap: true,
                outputStyle: 'nested'
            },
            dev: {
                files: {
                    'dest/css/main.min.css': 'src/sass/main.scss',
                    'dest/css/colormaker.min.css': 'src/sass/colormaker.scss'
                }
            }
        },

        // There is no 1 in Browser
        // -----------------------------------
        autoprefixer: {
            options: {
                browsers: ['last 3 versions', 'ie 8', 'ie 9'],
                map: true
            },
            dev: {
                src: 'dest/css/main.min.css',
                dest: 'dest/css/main.min.css'
            }
        },

        // Move fonts and images to dest
        // -----------------------------------
        copy: {
            dev: {
                files: [{
                    expand: true,
                    cwd: 'src/fonts',
                    src: ['**'],
                    dest: 'dest/fonts'
                }, {
                    expand: true,
                    cwd: 'src/img',
                    src: ['**'],
                    dest: 'dest/img'
                }]
            }
        },

        // Run shell commands (using for colormaker)
        // -----------------------------------
        shell: {
            php: {
                command: 'php -f includes/colormaker/gruntRun.php'
            }
        },

        // Work smarter...
        // -----------------------------------
        watch: {
            configFiles: {
                files: ['Gruntfile.js'],
                options: {
                    reload: true
                }
            },
            js: {
                files: [
                    'src/js/*.js',
                    'src/js/**/*.js',
                    'includes/modules/**/*.js'
                ],
                tasks: [
                    'uglify:dev',
                    'jshint',
                    'notify:watch'
                ],
                options: {
                    livereload: true
                }
            },
            css: {
                files: [
                    'includes/modules/**/*.scss',
                    'src/sass/*.scss',
                    'src/sass/**/*.scss'
                ],
                tasks: ['sass', 'shell:php', 'notify:watch'],
                options: {
                    livereload: true
                }
            },
            assets: {
                files: [
                    'src/img/*',
                    'src/fonts/*',
                ],
                tasks: ['copy'],
                options: {
                    livereload: true
                }
            }
        },
        browserSync: {
            dev: {
                bsFiles: {
                    src: ['dest/css/*.css', 'dest/js/*.js', './**/*.php']
                },
                options: {
                    proxy: "local.wordpress.dev",
                    watchTask: true
                }
            }
        },

        //------ System notifications --------------
        notify: {

            watch: {
                options: {
                    title: getMessage(),            // optional
                    message: 'SCSS & JS files compiled ' // required
                }
            },
            server: {
                options: {
                    message: 'Minified, autoprefixed and ready to go live!'
                }
            }
        }
    });

    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-jshint');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-copy');
    grunt.loadNpmTasks('grunt-sass');
    grunt.loadNpmTasks('grunt-autoprefixer');
    grunt.loadNpmTasks('grunt-notify');    
    grunt.loadNpmTasks('grunt-shell'); // for colormaker
//    grunt.loadNpmTasks('grunt-browser-sync');

    grunt.registerTask('default', [
        'concat',
        'copy',
        'sass',
        'uglify',
        'jshint',
        'autoprefixer',
        'shell',	// for colormaker
 //       'browserSync',
        'watch'
    ]);

};
