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

    private $theRequest;
    public function __construct()
    {
        //declare routes
        $args = array(
            array(
                'uri' => '/product/(?P<id>\d+)',
                'method' => 'GET',
                'callback' => 'show_single_product',
                'validate_callback' => 'validateInputs'
            )

        );


        //register other configs
        $this->register('digistyle/v1', $args);
    }

    //sanatize callback
    public function validateInputs($param, $request, $key)
    {

        return true;
    }

    //HERO route callback
    public function show_single_product($id)
    {

        return $id;

        return $args;
    }
}
