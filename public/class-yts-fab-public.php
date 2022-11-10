<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://www.github.com/yigitus/
 * @since      1.0.0
 *
 * @package    Yts_Fab
 * @subpackage Yts_Fab/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Yts_Fab
 * @subpackage Yts_Fab/public
 * @author     yigitus <zenginyigit@yandex.com>
 */
class Yts_Fab_Public {

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
		 * defined in Yts_Fab_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Yts_Fab_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/yts-fab-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Yts_Fab_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Yts_Fab_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/yts-fab-public.js', array( 'jquery' ), $this->version, false );

	}
	
	public function yts_register_code_on_body() {
		$yts_fab_options = get_option( 'yts_fab_option_name' );
		$text = $yts_fab_options['text_1'];
		$position = $yts_fab_options['position_2'];
		$link = $yts_fab_options['url_3'];
		$image_id = $yts_fab_options['image_id_4'];
		$width = $yts_fab_options['width_5'];
		$height = $yts_fab_options['height_6'];
		$border_radius = $yts_fab_options['border_radius_0'];
		$isActive = $yts_fab_options['isActive_0'];
		$image_url = $image_id != "" ? wp_get_attachment_image_src($image_id)[0]  : plugin_dir_url( __FILE__ ) . 'placeholder.png';

		if( $isActive == "true" ) {
			echo '<a href="' . esc_attr($link) . '" class="ytsfab-' . esc_attr($position) .'" id="yts_fab"><div id="yts_fab_text">' . esc_attr($text) . '</div><img alt="floating action button" style="width: ' . esc_attr($width) . 'px; height: ' . esc_attr($height) . 'px; border-radius: ' . esc_attr($border_radius) . 'px;" src="' . esc_attr($image_url) . '";></a>';
			echo '<script>function docReady(fn) {
				if (document.readyState === "complete" || document.readyState === "interactive") {
					setTimeout(fn, 1);
				} else {
					document.addEventListener("DOMContentLoaded", fn);
				}
			}
			
			docReady(() => {
				document.querySelector("#yts_fab").addEventListener("mouseover", () => {
					document.querySelector("#yts_fab_text").style.opacity = "100";
					document.querySelector("#yts_fab_text").style.display = "unset";
			
				});
			
				document.querySelector("#yts_fab").addEventListener("mouseleave", () => {
					document.querySelector("#yts_fab_text").style.opacity = "0";
					document.querySelector("#yts_fab_text").style.display = "none";
			
				});
			});</script>';
		}
	}
}
