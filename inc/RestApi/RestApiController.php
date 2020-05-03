<?php

/**
 * @package  ShayaNNN
 */

namespace Inc\RestApi;

class RestApiController
{

    public $settings;
    public $nameSpace;

    //register configs
    public function register($namespace, $args)
    {
        $this->nameSpace = $namespace;
        $this->settings = $args;
        add_action('rest_api_init', [$this, 'rest_api_register']);
    }

    //register routes
    public function rest_api_register()
    {


        foreach ($this->settings as $setting) :
            register_rest_route($this->nameSpace, $setting['uri'], array(
                'methods' => $setting['method'],
                'callback' => array($this, $setting['callback']),
                'args' => array(
                    'id' => array(
                        'validate_callback' => array($this, $setting['validationCallback'])
                    ),
                ),
            ));
        endforeach;
    }
}
