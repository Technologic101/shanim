Colormaker allows you to create multiple color palettes for your Wordpress theme. These palettes can be easily created and easily applied to a page or a module.

These instructions are for the Sonder's Pilot starter theme. If the step begins with "(*default*)", that step may be skipped in the Pilot theme and is included here for debugging (or for stripping out where necessary).

ACF and Grunt (with Sass) are required for this feature. 
If you're using Sonder's Pilot starter theme, open the functions.php file and set the $pilot->use_colormaker = 1.

First we need to setup your dependencies:
1. (*default*) add the following lines the devDependencies array in your package.json file:
	"devDependencies": {
		...
	    "grunt-shell": "^1.1.2",
	    "load-grunt-tasks": "^3.4.0"
	}

2. (*default*) modify your grunt file to include the following settings:
        sass: {
            dev: {
                files: {
                    'dest/css/colormaker.min.css': 'src/sass/colormaker.scss'
                }
            }
        },
	shell: {
		php: {
			command: 'php -f includes/colormaker/gruntRun.php'
		}
	},
	css: {
		files: [
			...
		],
		tasks: ['sass','shell:php'],
		options: {
			...
		}
	};

	grunt.loadNpmTasks('grunt-shell');
	grunt.registerTask('default', [
		...
		'shell',
		'watch'
	]);

NOTE: 
	The KEY in the sass.dev.files above ( files: { KEY : 'src/sass/colormaker.scss' }
	MUST MATCH the $args['color_css_url'] in the colormaker.php file.


3. In /src/sass/, include the file colormaker.scss. This file is where you will build your palette dependent styles. It should start with declared variables, one for each color defined in your palettes:
	$color_1 : colormaker_one;
	$color_2 : colormaker_two;
	
	The styles should follow this pattern:
	.color-class-name, .color-class-name.module {
		h1, h2, h3, h4, h5, h6 {
			color: $color_5;
		} 
	}

WHAT'S HAPPENING:
If you have Grunt Watch running, when colormaker.scss is saved, SASS will compile it to dest/css/colormaker.min.css using generic variables (where the output in colormaker.min.css will look like so:
.color-class-name h1, .color-class-name h2, .color-class-name.module h1, .color-class-name.module h2 {
  color: colormaker_five; }

Colormaker will then iterate over this for each palette that is defined in the admin section, and foreach color block will replace the color-class-name with the block's class name, and for each "colormaker_number" will find/replace with the respective color (as defined in admin).

Colormaker then COPIES the contents of colormaker.min.css and preprends it to main.min.css. 

(If you need to move the location of the colormaker.min.css contents within the main.min.css file, you can add the following comments and colormaker will place the colormaker.min.css between the comments:
/* Theme Colors */

/* END Theme Colors */

 

