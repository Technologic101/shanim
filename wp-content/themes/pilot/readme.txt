=== Pilot ===

Contributors: sonder agency
Tags: translation-ready, custom-background, theme-options, custom-menu, post-formats, threaded-comments

Requires at least: 4.0
Tested up to: 4.3.1
Stable tag: 1.0.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

A starter theme called Pilot.

== Description ==

Pilot is a module-based starter theme for projects on a small or medium scale.  Individual modules are 
located inside the 'includes' folder and can be added or removed as necessary.  Grunt tasks compile and
minify their components.

== Overview for Clients ==

Pilot Description and Feature List:

Our Pilot theme is designed to be a robust, user-friendly, and scalable architecture.  It operates on the idea that each part of each webpage is a separate, re-usable entity (module) that can be moved, edited, and colored with minimal effort on the part of the content provider.

We accomplish this by providing built-in modules that can be added to any page, or saved for usage across multiple pages.  By default, these modules include, but are not limited to:

o Image Carousels
o Image Galleries
o Background videos and popup videos
o Accordion content
o Table Content
o Blog Post Feeds
o Call to Action
o On-page navigation
o Generic WYSIWYG content

Each project has unique needs, and so we create and customize modules to meet user requirements.  New modules can be built and added to the site at any time without disrupting the site's functionality.  Within the theme files, we also provide documentation for other developers to edit or add their own modules.

Wordpress's administrative backend will also be customized to be simple and intuitive.  We add or reorganize features within Wordpress to allow for the revision, management, and archiving of site content.  

Pilot also includes a 'colormaker' feature.  With this, users have control over a limited number of theme colors used across the site.  Users can add new color sets and switch between color sets with the click of a button.

Behind the scenes, Pilot uses a system of file combination and minification to optimize site speed by serving as few files as possible and making those files as small as possible.  Its standardized approach to html architecture helps with Search Engine Optimization (SEO), theme maintenance, and accessibility.

== Installation ==
	
1. In your admin panel, go to Appearance > Themes and click the Add New button.
2. Click Upload and Choose File, then select the theme's .zip file. Click Install Now.
3. Click Activate to use your new theme right away.

== Frequently Asked Questions ==

= Does this theme support any plugins? =

Pilot includes support for Infinite Scroll in Jetpack.

== Module Containers ==

To create and use global module containers, go to Site Options > Global Modules.  Under 'module containers' you may add a container with a slug, then call the container in the html with get_all_blocks('slug').

Modules are not available by default to newly created containers.  To make a container available to a module, first create the container and it will appear as a link under 'Site Options'.  On that page modules can be added as options for the container under 'Included Modules'.  'Locations' will define if the container is available in the admin view for modules to be added to the container on a single-page basis.

== Global Modules ==

To create a module with defined content available to the full site, you need a global module. Global modules can be defined for individual containers once the container has been defined.  Then, in the Global Modules page, you can add module content to the containers that will be available as 'Predefined Modules' in the page admin areas.  Alternatively, these predefined modules can be rendered on every page by calling the container in the html as:

<?php get_all_blocks('slug', true); ?>

Please note that the title of the Predefined Block will be the title field of the module.  If the title field is empty, the module will appear as a blank select option in the Predefined Blocks menu, but is still available.