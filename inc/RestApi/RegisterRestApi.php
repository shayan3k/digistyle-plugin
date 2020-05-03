<?php

/**
 * @package  ShayaNNN
 */

namespace Inc\RestApi;

use WP_Error;
use WP_Query;
// use Inc\RestApi\RestApiController;

class RegisterRestApi extends RestApiController
{
    public function __construct()
    {
        new HeroRestApi();
        new ProductRestApi();
    }
}
