<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://github.com/abdallahoraby
 * @since      1.0.0
 *
 * @package    Pro_Filter
 * @subpackage Pro_Filter/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Pro_Filter
 * @subpackage Pro_Filter/public
 * @author     Rokaya & Abdallah <abdallahoraby@hotmail.com>
 */
class Pro_Filter_Public {

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
//		$this->version = $version;
		$this->version = rand();

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
		 * defined in Pro_Filter_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Pro_Filter_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/pro-filter-public.css', array(), $this->version, 'all' );
		wp_enqueue_style( 'base', plugin_dir_url( __FILE__ ) . 'css/base.css', array(), $this->version, 'all' );
		wp_enqueue_style( 'font', plugin_dir_url( __FILE__ ) . 'css/font.css', array(), $this->version, 'all' );
		wp_enqueue_style( 'animate', plugin_dir_url( __FILE__ ) . 'css/animate.css', array(), $this->version, 'all' );
		wp_enqueue_style( 'app', plugin_dir_url( __FILE__ ) . 'css/app.css', array(), $this->version, 'all' );
		wp_enqueue_style( 'fancybox', plugin_dir_url( __FILE__ ) . 'css/jquery.fancybox.min.css', array(), $this->version, 'all' );
		wp_enqueue_style( 'single-cpt', plugin_dir_url( __FILE__ ) . 'css/app-single.css', array(), $this->version, 'all' );
		wp_enqueue_style( 'bootstrapcss', plugin_dir_url( __FILE__ ) . 'css/bootstrap.min.css', array(), $this->version, 'all' );
		wp_enqueue_style( 'select2', plugin_dir_url( __FILE__ ) . 'css/select2.min.css', array(), $this->version, 'all' );
		wp_enqueue_style( 'myStyle', plugin_dir_url( __FILE__ ) . 'css/myStyle.css', array(), $this->version, 'all' );

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
		 * defined in Pro_Filter_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Pro_Filter_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/pro-filter-public.js', array( 'jquery' ), $this->version, false );
		wp_enqueue_script( 'slick', plugin_dir_url( __FILE__ ) . 'js/slick.min.js', array( 'jquery' ), $this->version, false );
		wp_enqueue_script( 'imgLiquid', plugin_dir_url( __FILE__ ) . 'js/imgLiquid-min.js', array( 'jquery' ), $this->version, false );
		wp_enqueue_script( 'wow', plugin_dir_url( __FILE__ ) . 'js/wow.min.js', array( 'jquery' ), $this->version, false );
		wp_enqueue_script( 'masonry', plugin_dir_url( __FILE__ ) . 'js/masonry.pkgd.min.js', array( 'jquery' ), $this->version, false );
		wp_enqueue_script( 'bootstrap', plugin_dir_url( __FILE__ ) . 'js/bootstrap-select.min.js', array( 'jquery' ), $this->version, false );
		wp_enqueue_script( 'fancybox', plugin_dir_url( __FILE__ ) . 'js/jquery.fancybox.min.js', array( 'jquery' ), $this->version, false );
		wp_enqueue_script( 'base', plugin_dir_url( __FILE__ ) . 'js/base.js', array( 'jquery' ), $this->version, false );
		wp_enqueue_script( 'main', plugin_dir_url( __FILE__ ) . 'js/main.js', array( 'jquery' ), $this->version, false );
		wp_enqueue_script( 'bootsatrapjs', plugin_dir_url( __FILE__ ) . 'js/bootstrap.min.js', array( 'jquery' ), $this->version, false );
		wp_enqueue_script( 'select2', plugin_dir_url( __FILE__ ) . 'js/select2.min.js', array( 'jquery' ), $this->version, false );
		wp_enqueue_script( 'myScript', plugin_dir_url( __FILE__ ) . 'js/myScript.js', array( 'jquery' ), $this->version, false );

	}

}
