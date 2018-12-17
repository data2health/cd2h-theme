## Development Requirements
* Yarn Package Manager

## Setup
1. Download the required dependencies with yarn: `yarn install`
2. Edit theme files as you normally would using your editor of choice.
3. Edits/additions to javascript should be defined in:
  * CSS: `inc/sass/theme/`
  * Javascript: `inc/js/`
4. If adding any new JS/CSS files, make sure to define them in `gulpfile.js` and `inc/sass/site.scss` as needed.
5. Run `gulp build` to compile and minify all static assets.

## Theme Structure
* This theme uses several custom post types. Each post type is defined in it's own file located in `inc/post_type/`

* Custom shortcodes/visual composer components are mapped in `inc/components/`

* This theme uses a custom widget for displaying recent posts in the sidebar for single posts. This can be found in `inc/widgets/recent_posts.php`

## Other Notes
* This theme requires [WP Bakery Page builder](https://wpbakery.com/). The plugin is included in the theme, located in `plugins\`. The theme will not run with out the plugin installed. The version included is compatible with WordPress 5.0.

* The theme also utilizes the plugin [Contact Form 7](https://wordpress.org/plugins/contact-form-7/). While it is not required to install the theme, several shortcodes will not run with out it, including the popup modal forms.

* After the theme is setup, there are additional settings that can be defined in the the `Theme Settings` area of the WordPress dashboard. This includes setting the url for the newsletter signup, the image that appears on error pages, copy for project categories with no projects, and `extra header scripts` area for adding additional script for tracking or analytics.
