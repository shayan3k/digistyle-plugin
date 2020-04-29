<?php

/**
 * @package  ShayaNNN
 */

namespace Inc\RestApi;

use WP_Error;

class ProductRestApi
{

    public function __construct()
    {
        add_action('rest_api_init', function () {
            register_rest_route('myplugin/v1', '/author/(?P<id>\d+)', array(
                'methods' => 'GET',
                'callback' => array($this, 'register_product_rest_api'),
                'args' => array(
                    'id' => array(
                        'validate_callback' => function ($param, $request, $key) {
                            return is_numeric($param);
                        }
                    ),
                ),
            ));
        });
    }


    public function register_product_rest_api($data)
    {
        $posts = get_posts(array(
            'id' => $data['id'],
        ));

        if (empty($posts)) {
            return new WP_Error('no_author', 'Invalid id', array('status' => 404));
        }

        return $posts[0]->post_title;
    }
}
