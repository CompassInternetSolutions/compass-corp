<?php

add_action( 'admin_init', 'compass_options_init' );
add_action( 'admin_menu', 'compass_options_add_page' );

/**
 * Init plugin options to white list our options
 * Syntax:
 * register_setting( $option_group, $option_name, $sanitize_callback );
 */
function compass_options_init(){
	register_setting( 'compass_options', 'compass_theme_options', 'compass_options_validate' );
}

/**
 * Load up the menu page
 * Syntax:
 * add_theme_page( $page_title, $menu_title, $capability, $menu_slug, $function);
 */
function compass_options_add_page() {
	add_theme_page( __( 'Compass Corp' ), __( 'Compass Options' ), 'edit_theme_options', 'compass_options', 'compass_options_page' );
}

/**
 * Create the options page
 */
function compass_options_page() {

	if ( ! isset( $_REQUEST['updated'] ) )
		$_REQUEST['updated'] = false;

	?>
	<div class="wrap">
		<?php screen_icon(); echo "<h2>" . get_current_theme() . __( ' Theme Options' ) . "</h2>"; ?>

		<?php if ( false !== $_REQUEST['updated'] ) : ?>
		<div class="updated fade"><p><strong><?php _e( 'Options Saved' ); ?></strong></p></div>
		<?php endif; ?>

		<form method="post" action="options.php">
			<?php settings_fields( 'compass_options' ); ?>
			<?php $options = get_option( 'compass_theme_options' ); ?>

			<table class="form-table">
			
			<?php
			/* Header */
			?>
			<tr><td><h3>Header</h3><td></tr>

				<tr valign="top"><th scope="row"><?php _e( 'Default Phone Number' ); ?></th>
					<td>
						<input id="compass_theme_options[phone_number]" class="regular-text" type="text" name="compass_theme_options[phone_number]" value="<?php esc_attr_e( $options['phone_number'] ); ?>" />
					</td>
				</tr>
				
				<tr valign="top"><th scope="row"><?php _e( 'Company Logo Full URL' ); ?></th>
					<td>
						<input id="compass_theme_options[logo_url]" class="regular-text" type="text" name="compass_theme_options[logo_url]" value="<?php esc_attr_e( $options['logo_url'] ); ?>" />
					</td>
				</tr>
				
				<tr valign="top"><th scope="row"><?php _e( 'Header Icons' ); ?></th>
					<td>
						<textarea id="compass_theme_options[header_icons]" class="large-text" cols="50" rows="8" name="compass_theme_options[header_icons]"><?php echo $options['header_icons']; ?></textarea>
						<label class="description" for="compass_theme_options[header_icons]"><?php _e( 'Header Icons XHTML' ); ?></label>
					</td>
				</tr>
				
			<?php
			/* Top Content Area */
			?>
				<tr><td><h3>Top Content Area</h3><td></tr>

				<tr valign="top"><th scope="row"><?php _e( 'Bullets Image Full URL' ); ?></th>
					<td>
						<input id="compass_theme_options[bullets_url]" class="regular-text" type="text" name="compass_theme_options[bullets_url]" value="<?php esc_attr_e( $options['bullets_url'] ); ?>" />
					</td>
				</tr>
				
			<?php
			/* Videos */
			?>
				<tr><td><h3>Videos</h3><td></tr>
				
				<tr valign="top"><th scope="row"><?php _e( 'Top Content Banner' ); ?></th>
					<td>
					Video URL<br /><input id="compass_theme_options[top_banner_vid]" class="regular-text" type="text" name="compass_theme_options[top_banner_vid]" value="<?php esc_attr_e( $options['top_banner_vid'] ); ?>" />
					<br />
					Video Thumbnail - 202x162px<br /><input id="compass_theme_options[top_banner_vid_th]" class="regular-text" type="text" name="compass_theme_options[top_banner_vid_th]" value="<?php esc_attr_e( $options['top_banner_vid_th'] ); ?>" />
					</td>
				</tr>
				
				<tr valign="top"><th scope="row"><?php _e( 'Client Testimonials' ); ?></th>
					<td>
						Video URL<br /><input id="compass_theme_options[client_testi_vid]" class="regular-text" type="text" name="compass_theme_options[client_testi_vid]" value="<?php esc_attr_e( $options['client_testi_vid'] ); ?>" />
					<br />
					Video Thumbnail - 163x100px<br />
					<input id="compass_theme_options[client_testi_vid_th]" class="regular-text" type="text" name="compass_theme_options[client_testi_vid_th]" value="<?php esc_attr_e( $options['client_testi_vid_th'] ); ?>" />
					</td>
				</tr>

			<?php
			/* Footer */
			?>
				<tr><td><h3>Footer</h3><td></tr>

				<tr valign="top"><th scope="row"><?php _e( 'Footer Disclaimer' ); ?></th>
					<td>
						<textarea id="compass_theme_options[footer_disc]" class="large-text" cols="50" rows="8" name="compass_theme_options[footer_disc]"><?php echo $options['footer_disc']; ?></textarea>
						<label class="description" for="compass_theme_options[footer_disc]"><?php _e( 'Footer Disclaimer XHTML' ); ?></label>
					</td>
				</tr>

			<?php
			/* Custom CSS Rules */
			?>
				<tr><td><h3>Custom Styling Rules</h3><td></tr>
				
				<tr valign="top"><th scope="row"><?php _e( 'Custom CSS Rules' ); ?></th>
					<td>
						<textarea id="compass_theme_options[custom_css]" class="large-text" cols="50" rows="20" name="compass_theme_options[custom_css]"><?php echo $options['custom_css']; ?></textarea>
						<label class="description" for="compass_theme_options[custom_css]"><?php _e( 'Custom User CSS - <strong>DO NOT forget to delete the comments, starts with "/*" ends with "*/"</strong>' ); ?></label>
					</td>
				</tr>
			</table>
			
			<?php
			/* SUBMIT */
			?>

			<p class="submit">
				<input type="submit" class="button-primary" value="<?php _e( 'Save Options' ); ?>" />
			</p>
		</form>
	</div>
	<?php
}

/**
 * Sanitize and validate input. Accepts an array, return a sanitized array.
 */
function compass_options_validate( $input ) {

	// Say our text option must be safe text with no HTML tags
	$input['phone_number'] = wp_filter_nohtml_kses( $input['phone_number'] );
	// Say our textarea option must be safe text
	$input['logo_url'] = wp_filter_nohtml_kses( $input['logo_url'] );
	$input['bullets_url'] = wp_filter_nohtml_kses( $input['bullets_url'] );
	$input['top_banner_vid'] = wp_filter_nohtml_kses( $input['top_banner_vid'] );
	$input['top_banner_vid_th'] = wp_filter_nohtml_kses( $input['top_banner_vid_th'] );
	$input['client_testi_vid'] = wp_filter_nohtml_kses( $input['client_testi_vid'] );
	$input['client_testi_vid_th'] = wp_filter_nohtml_kses( $input['client_testi_vid_th'] );
	// Say we dont care about filtering the content
	$input['custom_css'] = $input['custom_css'];
	$input['footer_disc'] = $input['footer_disc'];
	$input['header_icons'] = $input['header_icons'];
	return $input;
}

/**
 * Custom CSS Rules
 */
if (get_compass('custom_css') != null) {

	add_action( 'wp_head', 'compass_custom_css' );
	
	function compass_custom_css() { 
	?>
<style type="text/css" media="screen">
<?php echo get_compass('custom_css'); ?>

</style>
	
	<?php }
}
