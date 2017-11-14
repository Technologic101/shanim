The Module System in the Pilot Theme

Pilot uses a custom made module system. We found we were redesigning the same design and functionality for parts of websites over and over – like a full width background video, or a carousel, or a location map. We were rewriting the code for the same “block” a couple times in one website. And then we’d write the same code for a similar block for another website. There clearly had to be a better way. A way where we could reuse the code within a site and borrow it from other sites. So we built our modules system.

A “module” to us is a block on a webpage that is used on multiple pages, or multiple places on the same page. Like a banner with a background image and an <h1> title tag. Or a two-column layout. A “module” is a section that has a very specific style and functionality. Some common modules we use are:

•	“accordion” – which is a list of rows, where each row has a title, and clicking on the title opens a box below the row with content. Imagine an FAQ page.
•	“media” – this is a full width banner block, with a background image or background video and text that overlays (and a filter that sets the opacity over the background image and a color filter over the background image)
•	“slider” – this is a carousel for images
Before we started making “modules” we would build these using the Advanced Custom Fields (ACF) plugin, specifically the “flexible content field”. 

You can see the tutorial here for those: https://www.advancedcustomfields.com/resour
ces/flexible-content/
Some blog posts about using flexible content fields if you haven’t use them:
http://www.amyhaywood.com/modular-wordpress-theming-flexible-content/
http://www.creativebloq.com/web-design/build-modular-content-systems-wordpress-41514680

The Pilot Module System still uses the ACF plugin and the flexible content field, but we code it differently than you may have seen before. In fact, it’s better to think of Pilot’s Module System as a Plugin itself. 

First, there are some core “module handling” files located in the Pilot/includes/modules directory. Think of these like the WordPress core itself. There are the core files that run WordPress in wp-admin and wp-includes; you don’t touch those files. If you do, anything you code there will be overwritten when WordPress is updated. The “module handling” files in Pilot are the same. They manage the modules and you shouldn’t code in them. You really don’t need to think about the “module handling” files at all. (Unless there’s a bug – or some new desired “module handling” feature. In that case, make your request through Sonder).
All you usually need to think about are the module folders themselves. 

If you look in themes/pilot/include/modules you’ll see a dozen or so sub directories with names like ‘accordion’, ’slider’, and ‘table’. Each of those sub directories is a self-contained “module”. Each contains the same file structure: 

•	_modules.scss
•	functions.php
•	index.php
•	module.js
•	module_layout_acf_def.php
•	module-view.php
•	readme.txt

Let’s review these files.

module_layout_acf_def.php this is where you define your acf flexible content field. If you go into the ACF Plugin page in the admin section, you can create the acf fields you need there, and then from the admin->Custom Fields->Tools->Export Field Groups: you select the group you defined and click on the ‘Generate Export Code’ button. You can copy and paste from that output the fields you  want to include. Please review an existing module_layout_acf_def.php file for the proper format. You are not adding the entire output from the Generate Export Code, but merely the flexible content definition.

functions.php this, like a WordPress theme, is your custom functions location. Here, you only need to perform two items. You need to require the module_layout_acf_def.php above. And you need to create a function that will query the acf fields (or other data) and create an array of values to pass to the module-view.php (the template). Again, see an example for how this is done. The main goal is to put as much of your “logic” in this file – so that the module-view.php file is mostly HTML and easier to read. If you have javascript associated with this module (which would be located in the module.js file in this subdirectory), you need to enqueue it here.

module-view.php this is the template for your module. The available variables should be listed in the comments at the top of the file. It is permissible to write php logic here (and often necessary), but it should be as little as possible. Basically, only use php to check if the value exists before printing out the HTML.

_modules.scss You will add your styling for this module here. Please consult your project manager if you are working with Pilot’s Colormaker plugin on this  project as that has special instructions. To include your styling in the Grunt compiling process, open the file pilot/includes/modules.scss and add a line to import your module’s styling like so : 
@import "accordion/module";

