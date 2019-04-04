<?php
// Register Custom Post Type map
// Post Type Key: map
function create_map_cpt() {

    $labels = array(
        'name' => __( 'maps', 'Post Type General Name', 'skyfarm' ),
        'singular_name' => __( 'map', 'Post Type Singular Name', 'skyfarm' ),
        'menu_name' => __( 'Maps', 'skyfarm' ),
        'name_admin_bar' => __( 'map', 'skyfarm' ),
        'archives' => __( 'map Archives', 'skyfarm' ),
        'attributes' => __( 'map Attributes', 'skyfarm' ),
        'parent_item_colon' => __( 'Parent map:', 'skyfarm' ),
        'all_items' => __( 'All maps', 'skyfarm' ),
        'add_new_item' => __( 'Add New map', 'skyfarm' ),
        'add_new' => __( 'Add New', 'skyfarm' ),
        'new_item' => __( 'New map', 'skyfarm' ),
        'edit_item' => __( 'Edit map', 'skyfarm' ),
        'update_item' => __( 'Update map', 'skyfarm' ),
        'view_item' => __( 'View map', 'skyfarm' ),
        'view_items' => __( 'View maps', 'skyfarm' ),
        'search_items' => __( 'Search map', 'skyfarm' ),
        'not_found' => __( 'Not found', 'skyfarm' ),
        'not_found_in_trash' => __( 'Not found in Trash', 'skyfarm' ),
        'featured_image' => __( 'Featured Image', 'skyfarm' ),
        'set_featured_image' => __( 'Set featured image', 'skyfarm' ),
        'remove_featured_image' => __( 'Remove featured image', 'skyfarm' ),
        'use_featured_image' => __( 'Use as featured image', 'skyfarm' ),
        'insert_into_item' => __( 'Insert into map', 'skyfarm' ),
        'uploaded_to_this_item' => __( 'Uploaded to this map', 'skyfarm' ),
        'items_list' => __( 'maps list', 'skyfarm' ),
        'items_list_navigation' => __( 'maps list navigation', 'skyfarm' ),
        'filter_items_list' => __( 'Filter maps list', 'skyfarm' ),
    );
    $args = array(
        'label' => __( 'map', 'skyfarm' ),
        'description' => __( 'maps', 'skyfarm' ),
        'labels' => $labels,
        'menu_icon' => 'dashicons-admin-site',
        'supports' => array( 'title', 'editor', ),
        'taxonomies' => array(),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 6,
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'can_export' => true,
        'has_archive' => true,
        'hierarchical' => false,
        'exclude_from_search' => false,
        'show_in_rest' => true,
        'publicly_queryable' => true,
        'capability_type' => 'page',
    );
    register_post_type( 'map', $args );

}
add_action( 'init', 'create_map_cpt', 0 );



// Register Taxonomy category
// Taxonomy Key: category
function create_category_tax() {

    $labels = array(
        'name'              => _x( 'Categories', 'taxonomy general name', 'skyfarm' ),
        'singular_name'     => _x( 'Category', 'taxonomy singular name', 'skyfarm' ),
        'search_items'      => __( 'Search Categories', 'skyfarm' ),
        'all_items'         => __( 'All categories', 'skyfarm' ),
        'parent_item'       => __( 'Parent Category', 'skyfarm' ),
        'parent_item_colon' => __( 'Parent Category:', 'skyfarm' ),
        'edit_item'         => __( 'Edit Category', 'skyfarm' ),
        'update_item'       => __( 'Update Category', 'skyfarm' ),
        'add_new_item'      => __( 'Add New Category', 'skyfarm' ),
        'new_item_name'     => __( 'New Category Name', 'skyfarm' ),
        'menu_name'         => __( 'Category', 'skyfarm' ),
    );
    $args = array(
        'labels' => $labels,
        'description' => __( '', 'skyfarm' ),
        'hierarchical' => true,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_rest' => false,
        'show_tagcloud' => true,
        'show_in_quick_edit' => true,
        'show_admin_column' => true,
    );
    register_taxonomy( 'category', array('map', ), $args );

}
add_action( 'init', 'create_category_tax' );



// EXTRA FIELD ON SINGLE MAP POSTS FOR URL
class contactMetabox {
    private $screen = array(
        'map',
    );
    private $meta_fields = array(
        array(
            'label' => 'URL',
            'id' => 'website',
            'type' => 'url',
        ),
        array(
            'label' => 'Email',
            'id' => 'eml',
            'type' => 'email',
        ),
        array(
            'label' => 'Contact info',
            'id' => 'cntct',
            'type' => 'text',
        ),
        array(
            'label' => 'Logotype',
            'id' => 'lgtp',
            'type' => 'media',
        ),
        array(
            'label' => '[PRIVATE ADMIN NOTES]',
            'id' => 'admnnts',
            'type' => 'textarea',
        ),
        array(
            'label' => '|PARTNERSHIP?]',
            'id' => 'prtnrshp',
            'type' => 'select',
            'options' => array(
                'Yes, interesting!',
                'Nope!',
                'Under progress!',
                'Collaboration partnership agreement concluded ',
            ),
        ),
    );
    public function __construct() {
        add_action( 'add_meta_boxes', array( $this, 'add_meta_boxes' ) );
        add_action( 'admin_footer', array( $this, 'media_fields' ) );
        add_action( 'save_post', array( $this, 'save_fields' ) );
    }
    public function add_meta_boxes() {
        foreach ( $this->screen as $single_screen ) {
            add_meta_box(
                'contact',
                __( 'Contact', 'skyfarm' ),
                array( $this, 'meta_box_callback' ),
                $single_screen,
                'advanced',
                'default'
            );
        }
    }
    public function meta_box_callback( $post ) {
        wp_nonce_field( 'contact_data', 'contact_nonce' );
        $this->field_generator( $post );
    }
    public function media_fields() {
        ?><script>
            jQuery(document).ready(function($){
                if ( typeof wp.media !== 'undefined' ) {
                    var _custom_media = true,
                    _orig_send_attachment = wp.media.editor.send.attachment;
                    $('.contact-media').click(function(e) {
                        var send_attachment_bkp = wp.media.editor.send.attachment;
                        var button = $(this);
                        var id = button.attr('id').replace('_button', '');
                        _custom_media = true;
                            wp.media.editor.send.attachment = function(props, attachment){
                            if ( _custom_media ) {
                                $('input#'+id).val(attachment.url);
                            } else {
                                return _orig_send_attachment.apply( this, [props, attachment] );
                            };
                        }
                        wp.media.editor.open(button);
                        return false;
                    });
                    $('.add_media').on('click', function(){
                        _custom_media = false;
                    });
                }
            });
        </script><?php
    }
    public function field_generator( $post ) {
        $output = '';
        foreach ( $this->meta_fields as $meta_field ) {
            $label = '<label for="' . $meta_field['id'] . '">' . $meta_field['label'] . '</label>';
            $meta_value = get_post_meta( $post->ID, $meta_field['id'], true );
            if ( empty( $meta_value ) ) {
                $meta_value = $meta_field['default']; }
            switch ( $meta_field['type'] ) {
                case 'media':
                    $input = sprintf(
                        '<input style="width: 80%%" id="%s" name="%s" type="text" value="%s"> <input style="width: 19%%" class="button contact-media" id="%s_button" name="%s_button" type="button" value="Upload" />',
                        $meta_field['id'],
                        $meta_field['id'],
                        $meta_value,
                        $meta_field['id'],
                        $meta_field['id']
                    );
                    break;
                case 'select':
                    $input = sprintf(
                        '<select id="%s" name="%s">',
                        $meta_field['id'],
                        $meta_field['id']
                    );
                    foreach ( $meta_field['options'] as $key => $value ) {
                        $meta_field_value = !is_numeric( $key ) ? $key : $value;
                        $input .= sprintf(
                            '<option %s value="%s">%s</option>',
                            $meta_value === $meta_field_value ? 'selected' : '',
                            $meta_field_value,
                            $value
                        );
                    }
                    $input .= '</select>';
                    break;
                case 'textarea':
                    $input = sprintf(
                        '<textarea style="width: 100%%" id="%s" name="%s" rows="5">%s</textarea>',
                        $meta_field['id'],
                        $meta_field['id'],
                        $meta_value
                    );
                    break;
                default:
                    $input = sprintf(
                        '<input %s id="%s" name="%s" type="%s" value="%s">',
                        $meta_field['type'] !== 'color' ? 'style="width: 100%"' : '',
                        $meta_field['id'],
                        $meta_field['id'],
                        $meta_field['type'],
                        $meta_value
                    );
            }
            $output .= $this->format_rows( $label, $input );
        }
        echo '<table class="form-table"><tbody>' . $output . '</tbody></table>';
    }
    public function format_rows( $label, $input ) {
        return '<tr><th>'.$label.'</th><td>'.$input.'</td></tr>';
    }
    public function save_fields( $post_id ) {
        if ( ! isset( $_POST['contact_nonce'] ) )
            return $post_id;
        $nonce = $_POST['contact_nonce'];
        if ( !wp_verify_nonce( $nonce, 'contact_data' ) )
            return $post_id;
        if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
            return $post_id;
        foreach ( $this->meta_fields as $meta_field ) {
            if ( isset( $_POST[ $meta_field['id'] ] ) ) {
                switch ( $meta_field['type'] ) {
                    case 'email':
                        $_POST[ $meta_field['id'] ] = sanitize_email( $_POST[ $meta_field['id'] ] );
                        break;
                    case 'text':
                        $_POST[ $meta_field['id'] ] = sanitize_text_field( $_POST[ $meta_field['id'] ] );
                        break;
                }
                update_post_meta( $post_id, $meta_field['id'], $_POST[ $meta_field['id'] ] );
            } else if ( $meta_field['type'] === 'checkbox' ) {
                update_post_meta( $post_id, $meta_field['id'], '0' );
            }
        }
    }
}
if (class_exists('contactMetabox')) {
    new contactMetabox;
};