<?php

/**
 * This class is responsible of the Nice Title meta box.
 *
 * In particular, it's responsible of displaying the meta box and
 * saving the value(s) its form contains.
 *
 * @package    Nelio_Nice_Title
 * @subpackage Nelio_Nice_Title/admin
 * @author     Your Name <email@example.com>
 */
class Nelio_Nice_Title_Meta_Box {

	/**
	 * Displays the meta box.
	 *
	 * @param  WP_Post   $post   The object for the current post/page.
	 *
	 * @since    1.0.0
	 */
	public function display( $post ) {

		$post_id = $post->ID;
		$nice_title = get_post_meta( $post_id, '_nelio_nice_title', true );

		include plugin_dir_path( __FILE__ ) . 'partials/nelio-nice-title-meta-box.templ.php';

	}

	/**
	 * Registers the meta box and makes it available in the Post Editor display.
	 *
	 * @since    1.0.0
	 */
	public function register() {

		add_meta_box(
				'nelio-nice-title',
				'Nice Title',
				array( $this, 'display' )
			);

	}

	/**
	 * Saves all the fields displayed in the meta box.
	 *
	 * @param  int   $post_id   The ID of the post that's about to be saved.
	 *
	 * @since    1.0.0
	 */
	public function save( $post_id ) {

		// If we're auto-saving the post (post revisions), do nothing.
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}

		// If our text field is not set, do nothing.
		if ( ! isset( $_REQUEST['nelio-nice-title'] ) ) {
			return;
		}

		// If everything's OK, we get the data the user wrote, we clean it...
		$nice_title = trim( sanitize_text_field( $_REQUEST['nelio-nice-title'] ) );

		// ...and we save it as a post meta.
		update_post_meta( $post_id, '_nelio_nice_title', $nice_title );

	}

}
