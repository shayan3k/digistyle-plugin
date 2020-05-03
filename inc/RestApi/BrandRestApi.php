<?php

/**
 * @package  ShayaNNN
 */

namespace Inc\RestApi;

use WP_Error;
use WP_Query;
// use Inc\RestApi\RestApiController;

class BrandRestApi extends RestApiController
{
    public function __construct()
    {
        //declare routes
        $args = array(
            array(
                'uri' => '/brand/(?P<id>\d+)',
                'method' => 'GET',
                'callback' => 'register_product_rest_api',
                'validationCallback' => 'validateInputs'
            )
        );


        //register other configs
        $this->register('myplugin/v1', $args);
    }

    //sanatize callback
    public function validateInputs($param, $request, $key)
    {
        return is_numeric($param);
    }

    //route callback
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
