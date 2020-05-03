<?php

/**
 * @package  ShayaNNN
 */

namespace Inc\RestApi;

use WP_Error;
use WP_Query;

// use Inc\RestApi\RestApiController;

class ProductRestApi extends RestApiController
{
    public function __construct()
    {
        //declare routes
        $args = array(
            array(
                'uri' => '/author/(?P<id>\d+)',
                'method' => 'GET',
                'callback' => 'register_product_rest_api',
                'validationCallback' => 'validateInputs'
            ),
            array(
                'uri' => '/hero',
                'method' => 'GET',
                'callback' => 'rest_hero_callback',
                'validationCallback' => 'validateInputs'
            ),

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


    //HERO route callback
    public function rest_hero_callback($data)
    {
        $img[0] = get_option('hero_img_url_0');
        $img[1] = get_option('hero_img_url_1');
        $img[2] = get_option('hero_img_url_2');
        $img[3] = get_option('hero_img_url_3');
        $img[4] = get_option('hero_img_url_4');
        $img[5] = get_option('hero_img_url_5');

        $args = [];
        $i = 0;
        while ($i < 6) {
            $img[$i] ? array_push($args, strval($img[$i])) : '';
            $i++;
        }

        return $args;
    }
}
