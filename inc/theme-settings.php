<?php
// create custom plugin settings menu
add_action('admin_menu', 'theme_options_menu');

function theme_options_menu() {

  //create new top-level menu
  add_menu_page('Theme Options', 'Theme Options', 'administrator', 'twohandsfull-options', 'theme_options_page' , 'dashicons-admin-generic', 60 );

  //call register settings function
  add_action( 'admin_init', 'register_theme_options' );
}

function sanitize_code($input){
  return base64_encode($input);
}

function register_theme_options() {
  //register our settings
  register_setting( 'main-options', 'extra_header_scripts');
  register_setting( 'main-options', 'newsletter_url');
  register_setting( 'main-options', 'default_404_image' );
  register_setting( 'main-options', 'empty_category_message', array('sanitize_callback' => 'sanitize_code'));
}

function load_wp_media_files() {
  wp_enqueue_media();
}
add_action( 'admin_enqueue_scripts', 'load_wp_media_files' );

function theme_options_page() {
  ?>
  <script type="text/javascript">
  jQuery(document).ready(function($){
    $('.upload-btn').click(function(e) {
      e.preventDefault();
      var input = $(this).prev('.upload-target');
      var image = wp.media({
        title: 'Upload Image',
        // mutiple: true if you want to upload multiple files at once
        multiple: false
      }).open()
      .on('select', function(e){
        // This will return the selected image from the Media Uploader, the result is an object
        var uploaded_image = image.state().get('selection').first();
        // We convert uploaded_image to a JSON object to make accessing it easier
        // Output to the console uploaded_image
        console.log(uploaded_image);
        var image_url = uploaded_image.toJSON().url;
        // Let's assign the url value to the input field
        input.val(image_url);
      });
    });
  });
</script>
<div class="wrap">
  <h1>Theme Options</h1>

  <form method="post" action="options.php">
    <?php settings_fields( 'main-options' ); ?>
    <?php do_settings_sections( 'main-options' ); ?>
    <table class="form-table">
      <tr>
        <th scope="row">Newsletter URL</th>
        <td>
          <input id="newsletter_url" name="newsletter_url" class="regular-text code" type="text" value="<?php echo get_option('newsletter_url'); ?>" />
        </td>
      </tr>
      <tr>
        <th scope="row">Extra Header Scripts</th>
        <td>
            <textarea id="extra_header_scripts" name="extra_header_scripts" class="widefat code" rows="10"><?php echo esc_textarea( base64_decode(get_option('extra_header_scripts'))); ?></textarea>
            <p class="description">Any extra header scripts for things like tracking and analytics.</p>
        </td>
      </tr>

      <tr valign="top">
        <th scope="row">Error Page Background Image</th>
        <td>
          <img src="<?php echo get_option('default_404_image'); ?>" width="300" height="auto" /><br>
          <label for="upload_image">
            <input class="upload-target" id="default_404_image" type="text" size="36" name="default_404_image" value="<?php echo get_option('default_404_image'); ?>" />
            <input class="upload-btn" type="button" value="Upload Image" />
            <br /><p class="description">Background image that appears on error pages</p>
          </label>
        </td>
      </tr>

      <tr>
        <th scope="row">Empty Project Category Message</th>
        <td>
          <textarea id="empty_category_message" name="empty_category_message" class="widefat code" rows="10"><?php echo esc_textarea( base64_decode(get_option('empty_category_message'))); ?></textarea>
          <p class="description">Message displayed when there are no active projects in a given category.</p>
        </td>
      </tr>
    </table>

    <?php submit_button(); ?>

  </form>
</div>
<?php } ?>
