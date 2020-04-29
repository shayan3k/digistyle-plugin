<?php

/**
 * @package  ShayaNNN
 */

namespace Inc\PostTypes;

use WP_Post_Type;

class wp_post_type_product
{

    public function __construct()
    {

        $labels = array(
            'name'          => __('Products', 'digistyle'),
            'singular_name' => __('Product', 'digistyle'),
            'add_new'            => __('Add New Product', 'digistyle'),
            'add_new_item'       => __('Add New Product', 'digistyle'),
            'edit_item'          => __('Edit Product', 'digistyle'),
            'new_item'           => __('Add New Product', 'digistyle'),
            'view_item'          => __('View Product', 'digistyle'),
            'search_items'       => __('Search Product', 'digistyle'),
            'not_found'          => __('No product found', 'digistyle'),
            'not_found_in_trash' => __('No product found in trash', 'digistyle')
        );

        $supports = array(
            'title',
            'editor',
            'thumbnail',
            'comments',
            'excerpt'
        );

        $args = array(
            'labels'               => $labels,
            'supports'             => $supports,
            'public'               => true,
            'capability_type'      => 'post',
            // 'taxonomies' => array('category', 'color'), this line should be commented out
            'rewrite'              => array('slug' => 'products'),
            'has_archive'          => true,
            'menu_position'        => 30,
            'menu_icon'            => 'dashicons-cart',
            'register_meta_box_cb' => [$this, 'wpt_add_product_metaboxes'],
        );

        register_post_type('wp_products', $args);


        //handle post metas 
        add_action('save_post', array($this, 'wpt_save_products_meta'), 1, 2);
    }

    public function wpt_add_product_metaboxes()
    {
        add_meta_box(
            'wpt_products_price',
            'Price',
            array($this, 'wpt_products_price'),
            'wp_products',
            'side',
            'default'
        );
    }

    public function wpt_products_price()
    {
        global $post;


        // Nonce field to validate form request came from current site
        wp_nonce_field(basename(__FILE__), 'product_fields');

        // Get the price data if it's already been entered
        $price = get_post_meta($post->ID, 'price', true);

        // Output the field
        echo '<input type="text" maxlength="11" name="price" value="' . esc_textarea($price)  . '" class="widefat">';
    }


    /**
     * Save the metabox data
     */
    public function wpt_save_products_meta($post_id, $post)
    {

        // Return if the user doesn't have edit permissions.
        if (!current_user_can('edit_post', $post_id)) {
            return $post_id;
        }

        // Verify this came from the our screen and with proper authorization,
        // because save_post can be triggered at other times.
        if (!isset($_POST['price']) || !wp_verify_nonce($_POST['product_fields'], basename(__FILE__))) {
            return $post_id;
        }

        // Now that we're authenticated, time to save the data.
        // This sanitizes the data from the field and saves it into an array $products_meta.
        $products_meta['price'] = esc_textarea($_POST['price']);

        // Cycle through the $products_meta array.
        // Note, in this example we just have one item, but this is helpful if you have multiple.
        foreach ($products_meta as $key => $value) :

            // Don't store custom data twice
            if ('revision' === $post->post_type) {
                return;
            }

            if (get_post_meta($post_id, $key, false)) {
                // If the custom field already has a value, update it.
                update_post_meta($post_id, $key, $value);
            } else {
                // If the custom field doesn't have a value, add it.
                add_post_meta($post_id, $key, $value);
            }

            if (!$value) {
                // Delete the meta key if there's no value
                delete_post_meta($post_id, $key);
            }

        endforeach;
    }
}
