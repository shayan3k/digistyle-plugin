<?php

/**
 * @package  ShayaNNN
 */

namespace Inc\Api\Callbacks;

use Inc\Base\BaseController;

class AdminCallbacks extends BaseController
{
	public function dashboardTemplate()
	{
		return require_once("$this->plugin_path/templates/dashboard.php");
	}

	public function subPageTemplate()
	{
		return require_once("$this->plugin_path/templates/subPage.php");
	}


	public function alecadddOptionsGroup($input)
	{
		return $input;
	}

	public function alecadddAdminSection()
	{
		echo 'Check this beautiful section!';
	}

	public function alecadddTextExample()
	{
		$value = esc_attr(get_option('text_example'));
		echo '<input type="text" class="regular-text" name="text_example" value="' . $value . '" placeholder="Write Something Here!">';
	}

	public function alecadddFirstName()
	{
		$value = esc_attr(get_option('first_name'));
		echo '<input type="text" class="regular-text" name="first_name" value="' . $value . '" placeholder="Write your First Name">';
	}
}
