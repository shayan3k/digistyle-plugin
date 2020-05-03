<?php

/**
 * @package  ShayaNNN
 */

namespace Inc\Base;

/**
 * 
 */
class Enqueue
{
	public function register()
	{
		add_action('admin_enqueue_scripts', array($this, 'enqueue'));
	}

	function enqueue()
	{
		//Enable Media 
		wp_enqueue_media();

		// enqueue all our scripts
		wp_enqueue_style('adminStyle', PLUGIN_URL . 'assets/mystyle.css');
		wp_enqueue_script('adminScript', PLUGIN_URL . 'assets/myscript.js');
	}
}
