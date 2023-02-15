<?php

/**
 * Fired during plugin activation
 *
 * @link       http://github.com/abdallahoraby
 * @since      1.0.0
 *
 * @package    Pro_Filter
 * @subpackage Pro_Filter/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Pro_Filter
 * @subpackage Pro_Filter/includes
 * @author     Rokaya & Abdallah <abdallahoraby@hotmail.com>
 */
class Pro_Filter_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {

        // create our custom pages and add shortcode to it ( Projects Page )

        $projects_page = array();
        $projects_page['post_title'] = "Projects";
        $projects_page['post_content'] = "[pro-filter-projects]";
        $projects_page['post_status'] = "publish";
        $projects_page['post_name'] = "projects";
        $projects_page['post_type'] = "page";

        if( !is_page('projects') ){
            $projects_page_id = wp_insert_post( $projects_page );
            add_option('projects_page_id', $projects_page_id ); // add record to wp_options table
            wp_reset_postdata ();
        }


	}

}
