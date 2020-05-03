<?php

/**
 * @package  ShayaNNN
 */

namespace Inc\RestApi;

use WP_Error;
use WP_Query;

// use Inc\RestApi\RestApiController;

class HeroRestApi extends RestApiController
{
    public function __construct()
    {
        //declare routes
        $args = array(
            array(
                'uri' => '/hero',
                'method' => 'GET',
                'callback' => 'rest_hero_callback',
            ),

        );


        //register other configs
        $this->register('digistyle/v1', $args);
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
