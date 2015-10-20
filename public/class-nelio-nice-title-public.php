<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Nelio_Nice_Title
 * @subpackage Nelio_Nice_Title/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Nelio_Nice_Title
 * @subpackage Nelio_Nice_Title/public
 * @author     Your Name <email@example.com>
 */
class Nelio_Nice_Title_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Nelio_Nice_Title_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Nelio_Nice_Title_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/nelio-nice-title-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Nelio_Nice_Title_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Nelio_Nice_Title_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/nelio-nice-title-public.js', array( 'jquery' ), $this->version, false );

	}

	/**
	 * Modifies the title of the given post and appends Nelio's Nice Title (if any).
	 *
	 * @param   string   $title   the post title.
	 * @param   int      $id      the ID of the post.
	 *
	 * @return  string   the original title with Nelio's Nice Title appended (if any).
	 *
	 * @since    1.0.0
	 */
	public function append_nice_title( $title, $id ) {

		$nice_title = get_post_meta( $id, '_nelio_nice_title', true );
		if ( ! empty( $nice_title ) ) {
			$title = $title . '&mdash;' . $nice_title;
		}
		return $title;

	}

}
