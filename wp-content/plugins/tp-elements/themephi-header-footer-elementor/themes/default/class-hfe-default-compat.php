<?php
/**
 * HFE_Default_Compat setup
 */

namespace HFE\Themes;

/**
 * theme compatibility.
 */
class HFE_Default_Compat {

	/**
	 *  Initiator
	 */
	public function __construct() {
		add_action( 'wp', [ $this, 'hooks' ] );
	}

	/**
	 * Run all the Actions / Filters.
	 */
	public function hooks() {
		if ( hfe_header_enabled() ) {
			// Replace header.php template.
			add_action( 'get_header', [ $this, 'override_header' ] );

			// Display HFE's header in the replaced header.
			add_action( 'hfe_header', 'hfe_render_header' );
		}

		if ( hfe_footer_enabled() || hfe_is_before_footer_enabled() ) {
			// Replace footer.php template.
			add_action( 'get_footer', [ $this, 'override_footer' ] );
		}

		if ( hfe_footer_enabled() ) {
			// Display HFE's footer in the replaced header.
			add_action( 'hfe_footer', 'hfe_render_footer' );
		}

		if ( hfe_is_before_footer_enabled() ) {
			add_action( 'hfe_footer_before', [ 'Header_Footer_Elementor', 'get_before_footer_content' ] );
		}
	}

	/**
	 * Function for overriding the header in the elmentor way.
	 *
	 * @since 1.2.0
	 *
	 * @return void
	 */
	public function override_header() {
		require TPHFE_DIR . 'themes/default/hfe-header.php';
		$templates   = [];
		$templates[] = 'header.php';
		// Avoid running wp_head hooks again.
		remove_all_actions( 'wp_head' );
		ob_start();
		locate_template( $templates, true );
		ob_get_clean();
	}

	/**
	 * Function for overriding the footer in the elmentor way.
	 *
	 * @since 1.2.0
	 *
	 * @return void
	 */
	public function override_footer() {
		require TPHFE_DIR . 'themes/default/hfe-footer.php';
		$templates   = [];
		$templates[] = 'footer.php';
		// Avoid running wp_footer hooks again.
		remove_all_actions( 'wp_footer' );
		ob_start();
		locate_template( $templates, true );
		ob_get_clean();
	}

}

new HFE_Default_Compat();
