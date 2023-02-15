<?php



/**********************************************************************
 * Projects Custom Metaboxes
 ***********************************************************************/



add_action( 'add_meta_boxes', function() {
    add_meta_box( 'custom-metabox', 'Project Additional Info', 'fill_metabox', 'projects', 'normal' );
});

function fill_metabox( $post ) {
    wp_nonce_field( basename(__FILE__), 'mam_nonce' );

    // How to use 'get_post_meta()' for multiple checkboxes as array?
    $postmeta = maybe_unserialize( get_post_meta( $post->ID, 'course_developers', true ) );


    // get all developers
    $args = array(
        'post_type' => 'developers',
        'post_status' => array( 'publish' ),
        'posts_per_page' => -1,
        'orderby' => 'date',
        'order' => 'DESC'
    );
    $developers_query = new WP_Query( $args );

    $developers_posts = $developers_query->posts;


    // get all locations
    $args_locations = array(
        'post_type' => 'locations',
        'post_status' => array( 'publish' ),
        'posts_per_page' => -1,
        'orderby' => 'date',
        'order' => 'DESC'
    );
    $locations_query = new WP_Query( $args_locations );

    $locations_posts = $locations_query->posts;


    // get all Consultant
    $args_consultant = array(
        'post_type' => 'consultant',
        'post_status' => array( 'publish' ),
        'posts_per_page' => -1,
        'orderby' => 'date',
        'order' => 'DESC'
    );
    $consultant_query = new WP_Query( $args_consultant );

    $consultant_posts = $consultant_query->posts;




    ?>

<!--    <input id="project_banner" type="text" size="36" name="project_banner" value="" />-->
<!--    <input id="upload_image_button" type="button" value="Upload Image" />-->



    <h3>Select Developer: </h3>

    <p>
        <select name="developer" >

            <?php foreach ($developers_posts as $developer): ?>

                <?php
                if ( $developer->post_title === get_post_meta( get_the_ID(), 'developer', true ) ) {
                    $selected = 'selected';
                } else {
                    $selected = '';
                }
                ?>

                <option value="<?php echo $developer->post_title; ?>" <?php echo $selected; ?> > <?php echo $developer->post_title;?> </option>

            <?php endforeach; ?>

        </select>
    </p>

    <h3>Select Location: </h3>

    <p>
        <select name="location" >

            <?php foreach ($locations_posts as $location): ?>

                <?php
                if ( $location->post_title === get_post_meta( get_the_ID(), 'location', true ) ) {
                    $selected = 'selected';
                } else {
                    $selected = '';
                }
                ?>

                <option value="<?php echo $location->post_title; ?>" <?php echo $selected; ?> > <?php echo $location->post_title;?> </option>

            <?php endforeach; ?>

        </select>
    </p>


    <h3>Select Consultant: </h3>

    <p>
        <select name="consultant" >

            <?php foreach ($consultant_posts as $consultant): ?>

                <?php
                if ( $consultant->post_title === get_post_meta( get_the_ID(), 'consultant', true ) ) {
                    $selected = 'selected';
                } else {
                    $selected = '';
                }
                ?>

                <option value="<?php echo $consultant->post_title; ?>" <?php echo $selected; ?> > <?php echo $consultant->post_title;?> </option>

            <?php endforeach; ?>

        </select>
    </p>


    <h3> Contract Value: </h3>
    <input type="text" value="<?php echo get_post_meta($post->ID, 'contract_value', true) ;?>" id="contract_value" name="contract_value" placeholder="">


    <h3> BUA: </h3>
    <input type="text" value="<?php echo get_post_meta($post->ID, 'bua', true) ;?>" id="bua" name="bua" placeholder="">


    <h3>Status: </h3>
    <input type="text" value="<?php echo get_post_meta($post->ID, 'project_status', true) ;?>" id="project_status" name="project_status" placeholder="">

    <?php
    function misha_gallery_field( $name, $value = '' ) {

        $html = '<div><ul class="misha_gallery_mtb">';
        /* array with image IDs for hidden field */
        $hidden = array();


        if( $images = get_posts( array(
            'post_type' => 'attachment',
            'orderby' => 'post__in', /* we have to save the order */
            'order' => 'ASC',
            'post__in' => explode(',',$value), /* $value is the image IDs comma separated */
            'numberposts' => -1,
            'post_mime_type' => 'image'
        ) ) ) {

            foreach( $images as $image ) {
                $hidden[] = $image->ID;
                $image_src = wp_get_attachment_image_src( $image->ID, array( 80, 80 ) );
                $html .= '<li data-id="' . $image->ID .  '"><span style="background-image:url(' . $image_src[0] . ')"></span><a href="#" class="misha_gallery_remove">×</a></li>';
            }

        }

        $html .= '</ul><div style="clear:both"></div></div>';
        $html .= '<input type="hidden" name="'.$name.'" value="' . join(',',$hidden) . '" /><a href="#" class="button misha_upload_gallery_button">Add Images</a>';

        return $html;
    }

    /*
    * Meta Box HTML
    */

    $meta_key = 'project_gallery';
    echo '<h3> Gallery: </h3>';
    echo misha_gallery_field( $meta_key, get_post_meta($post->ID, $meta_key, true) );



}


add_action( 'save_post', function( $post_id ) {
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'mam_nonce' ] ) && wp_verify_nonce( $_POST[ 'mam_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';

    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
        return;
    }

//    // If the checkbox was not empty, save it as array in post meta
//    if ( ! empty( $_POST['project_banner'] ) ) {
//        update_post_meta( $post_id, 'project_banner', $_POST['project_banner'] );
//        // Otherwise just delete it if its blank value.
//    } else {
//        delete_post_meta( $post_id, 'project_banner' );
//    }

    // If the checkbox was not empty, save it as array in post meta
    if ( ! empty( $_POST['developer'] ) ) {
        update_post_meta( $post_id, 'developer', $_POST['developer'] );
        // Otherwise just delete it if its blank value.
    } else {
        delete_post_meta( $post_id, 'developer' );
    }

    // If the checkbox was not empty, save it as array in post meta
    if ( ! empty( $_POST['location'] ) ) {
        update_post_meta( $post_id, 'location', $_POST['location'] );
        // Otherwise just delete it if its blank value.
    } else {
        delete_post_meta( $post_id, 'location' );
    }

    // If the checkbox was not empty, save it as array in post meta
    if ( ! empty( $_POST['consultant'] ) ) {
        update_post_meta( $post_id, 'consultant', $_POST['consultant'] );
        // Otherwise just delete it if its blank value.
    } else {
        delete_post_meta( $post_id, 'consultant' );
    }

    // If the checkbox was not empty, save it as array in post meta
    if ( ! empty( $_POST['contract_value'] ) ) {
        update_post_meta( $post_id, 'contract_value', $_POST['contract_value'] );
        // Otherwise just delete it if its blank value.
    } else {
        delete_post_meta( $post_id, 'contract_value' );
    }

    // If the checkbox was not empty, save it as array in post meta
    if ( ! empty( $_POST['bua'] ) ) {
        update_post_meta( $post_id, 'bua', $_POST['bua'] );
        // Otherwise just delete it if its blank value.
    } else {
        delete_post_meta( $post_id, 'bua' );
    }

    // If the checkbox was not empty, save it as array in post meta
    if ( ! empty( $_POST['project_status'] ) ) {
        update_post_meta( $post_id, 'project_status', $_POST['project_status'] );
        // Otherwise just delete it if its blank value.
    } else {
        delete_post_meta( $post_id, 'project_status' );
    }

    // If the checkbox was not empty, save it as array in post meta
    if ( ! empty( $_POST['project_gallery'] ) ) {
        update_post_meta( $post_id, 'project_gallery', $_POST['project_gallery'] );
        // Otherwise just delete it if its blank value.
    } else {
        delete_post_meta( $post_id, 'project_gallery' );
    }






});




/**
 * Generated by the WordPress Meta Box Generator
 * https://jeremyhixon.com/tool/wordpress-meta-box-generator/
 *
 * Retrieving the values:
 * Banner image = get_post_meta( get_the_ID(), 'banner_banner-image', true )
 */
class Banner {
    private $config = '{"title":"Banner","prefix":"banner_","domain":"banner","class_name":"Banner","post-type":["projects"],"context":"normal","priority":"high","fields":[{"type":"media","label":"Banner image","return":"url","id":"banner_banner-image"}]}';

    public function __construct() {
        $this->config = json_decode( $this->config, true );
        $this->process_cpts();
        add_action( 'add_meta_boxes', [ $this, 'add_meta_boxes' ] );
        add_action( 'admin_enqueue_scripts', [ $this, 'admin_enqueue_scripts' ] );
        add_action( 'admin_head', [ $this, 'admin_head' ] );
        add_action( 'save_post', [ $this, 'save_post' ] );
    }

    public function process_cpts() {
        if ( !empty( $this->config['cpt'] ) ) {
            if ( empty( $this->config['post-type'] ) ) {
                $this->config['post-type'] = [];
            }
            $parts = explode( ',', $this->config['cpt'] );
            $parts = array_map( 'trim', $parts );
            $this->config['post-type'] = array_merge( $this->config['post-type'], $parts );
        }
    }

    public function add_meta_boxes() {
        foreach ( $this->config['post-type'] as $screen ) {
            add_meta_box(
                sanitize_title( $this->config['title'] ),
                $this->config['title'],
                [ $this, 'add_meta_box_callback' ],
                $screen,
                $this->config['context'],
                $this->config['priority']
            );
        }
    }

    public function admin_enqueue_scripts() {
        global $typenow;
        if ( in_array( $typenow, $this->config['post-type'] ) ) {
            wp_enqueue_media();
        }
    }

    public function admin_head() {
        global $typenow;
        if ( in_array( $typenow, $this->config['post-type'] ) ) {
            ?><script>
                jQuery.noConflict();
                (function($) {
                    $(function() {
                        $('body').on('click', '.rwp-media-toggle', function(e) {
                            e.preventDefault();
                            let button = $(this);
                            let rwpMediaUploader = null;
                            rwpMediaUploader = wp.media({
                                title: button.data('modal-title'),
                                button: {
                                    text: button.data('modal-button')
                                },
                                multiple: true
                            }).on('select', function() {
                                let attachment = rwpMediaUploader.state().get('selection').first().toJSON();
                                button.prev().val(attachment[button.data('return')]);
                            }).open();
                        });
                    });
                })(jQuery);
            </script><?php
        }
    }

    public function save_post( $post_id ) {
        foreach ( $this->config['fields'] as $field ) {
            switch ( $field['type'] ) {
                default:
                    if ( isset( $_POST[ $field['id'] ] ) ) {
                        $sanitized = sanitize_text_field( $_POST[ $field['id'] ] );
                        update_post_meta( $post_id, $field['id'], $sanitized );
                    }
            }
        }
    }

    public function add_meta_box_callback() {
        $this->fields_table();
    }

    private function fields_table() {
        ?><table class="form-table" role="presentation">
        <tbody><?php
        foreach ( $this->config['fields'] as $field ) {
            ?><tr>
            <th scope="row"><?php $this->label( $field ); ?></th>
            <td><?php $this->field( $field ); ?></td>
            </tr><?php
        }
        ?></tbody>
        </table><?php
    }

    private function label( $field ) {
        switch ( $field['type'] ) {
            case 'media':
                printf(
                    '<label class="" for="%s_button">%s</label>',
                    $field['id'], $field['label']
                );
                break;
            default:
                printf(
                    '<label class="" for="%s">%s</label>',
                    $field['id'], $field['label']
                );
        }
    }

    private function field( $field ) {
        switch ( $field['type'] ) {
            case 'media':
                $this->input( $field );
                $this->media_button( $field );
                break;
            default:
                $this->input( $field );
        }
    }

    private function input( $field ) {
        if ( $field['type'] === 'media' ) {
            $field['type'] = 'text';
        }
        printf(
            '<input class="regular-text %s" id="%s" name="%s" %s type="%s" value="%s">',
            isset( $field['class'] ) ? $field['class'] : '',
            $field['id'], $field['id'],
            isset( $field['pattern'] ) ? "pattern='{$field['pattern']}'" : '',
            $field['type'],
            $this->value( $field )
        );
    }

    private function media_button( $field ) {
        printf(
            ' <button class="button rwp-media-toggle" data-modal-button="%s" data-modal-title="%s" data-return="%s" id="%s_button" name="%s_button" type="button">%s</button>',
            isset( $field['modal-button'] ) ? $field['modal-button'] : __( 'Select this file', 'banner' ),
            isset( $field['modal-title'] ) ? $field['modal-title'] : __( 'Choose a file', 'banner' ),
            $field['return'],
            $field['id'], $field['id'],
            isset( $field['button-text'] ) ? $field['button-text'] : __( 'Upload', 'banner' )
        );
    }

    private function value( $field ) {
        global $post;
        if ( metadata_exists( 'post', $post->ID, $field['id'] ) ) {
            $value = get_post_meta( $post->ID, $field['id'], true );
        } else if ( isset( $field['default'] ) ) {
            $value = $field['default'];
        } else {
            return '';
        }
        return str_replace( '\u0027', "'", $value );
    }

}
new Banner;