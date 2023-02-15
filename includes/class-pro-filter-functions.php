<?php

function pre_dump($arr)
{

    echo '<pre>';
    var_dump($arr);
    echo '</pre>';

}


function my_enqueue() {

    wp_enqueue_script( 'ajax-script', home_url() . '/js/myScript.js', array('jquery'), rand(), true );

    wp_add_inline_script( 'ajax-script',
        'const myVariables = ' . json_encode(
            array(
                'ajaxurl' => admin_url( 'admin-ajax.php' ),
            ) ),
        'before' );
}

add_action( 'wp_enqueue_scripts', 'my_enqueue' );


/*****
 * override templates
 */

/* Filter the single_template with our custom function*/
add_filter('single_template', 'my_custom_template');

function my_custom_template($single) {

    global $post;

    /* Checks for single template by post type */
    if ( $post->post_type == 'projects' ) {
        return ABSPATH . 'wp-content/plugins/pro-filter/public/templates/single-project.php';
    }

    return $single;

}


add_filter('archive_template', 'yourplugin_get_custom_archive_template');

function yourplugin_get_custom_archive_template($template) {
    global $wp_query;
    if (is_post_type_archive('projects')) {
        $templates[] = 'archive-projects.php';
        $template =  ABSPATH . 'wp-content/plugins/pro-filter/public/templates/archive-projects.php';
    }
    return $template;
}


