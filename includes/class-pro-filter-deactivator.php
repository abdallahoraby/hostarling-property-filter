<?php

/**
 * Fired during plugin deactivation
 *
 * @link       http://github.com/abdallahoraby
 * @since      1.0.0
 *
 * @package    Pro_Filter
 * @subpackage Pro_Filter/includes
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    Pro_Filter
 * @subpackage Pro_Filter/includes
 * @author     Rokaya & Abdallah <abdallahoraby@hotmail.com>
 */
class Pro_Filter_Deactivator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function deactivate() {

        $projects_page_id = get_option('projects_page_id');
        if( !empty($projects_page_id) ){
            wp_delete_post($projects_page_id, true);
            wp_reset_postdata ();
        }


	}

}
