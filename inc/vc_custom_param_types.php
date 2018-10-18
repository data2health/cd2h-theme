<?php
/*
 * Register custom param types for Visual Composer shortcodes
 */
if ( ! class_exists( 'seachange_VC_Custom_Param_Types' ) ) {
	class beam_VC_Custom_Param_Types {
		// Initialization of the param types
		public function __construct() {
			// Register custom param types
			vc_add_shortcode_param( 'upload_file', array( $this, 'upload_file' ) );
		}
		// Function for registering the upload_file custom param type
		function upload_file( $settings, $value ) {
			ob_start();
			?>

			<div class="select_fa_icon_bb_param_block">
				<input name="<?php echo esc_attr( $settings['param_name'] ); ?>" class="wpb_vc_param_value wpb-textinput <?php echo esc_attr( $settings['param_name'] ) . ' ' . esc_attr( $settings['type'] ); ?>_field" id="<?php echo esc_attr( $settings['param_name'] ); ?>" type="text" value="<?php echo esc_attr( $value ); ?>" />
				<input type="button" onclick="WidgetsUploader.fileUploader.openFileFrame( '<?php echo esc_attr( $settings['param_name'] ); ?>' );" class="upload-brochure-file button button-secondary" value="<?php _ex( 'Upload file', 'backend', 'vc-elements-pt' ); ?>" />
			</div>

			<?php
			return ob_get_clean();
		}
	}
	new beam_VC_Custom_Param_Types;
}
