<?php

/**
 * @package  ShayaNNN
 */

namespace Inc\Api\Callbacks;

use Inc\Base\BaseController;

class AdminCallbacks extends BaseController
{
	public function settingTemplate()
	{
		return require_once("$this->plugin_path/templates/settingTemplate.php");
	}

	public function subPageTemplate()
	{
		return require_once("$this->plugin_path/templates/subPage.php");
	}


	public function TextExampleSanetize($input)
	{
		return $input;
	}

	public function settingPageSections()
	{
		echo 'Check this beautiful section!';
	}

	public function settingPageField0()
	{

		$imgUrl = get_option('hero_img_url_0');

		echo '<div class="col-12 col-md-4">';
		echo '<img class="w-100 h-100 js_custom_upload_media_hero js_custom_upload_media_multiple_img_0" src="' . $imgUrl . '" alt="pic" />';
		echo '<input type="text" class="form-control js_custom_upload_media__hero_input_0" name="hero_img_url_0" value="' . $imgUrl  . '" placeholder="Write Something Here!" hidden>';
		echo '</div>';
	}

	public function settingPageField1()
	{

		$imgUrl = get_option('hero_img_url_1');

		echo '<div class="col-12 col-md-4">';
		echo '<img class="w-100 h-100 js_custom_upload_media_hero js_custom_upload_media_multiple_img_1" src="' . $imgUrl . '" alt="pic" />';
		echo '<input type="text" class="form-control js_custom_upload_media__hero_input_1" name="hero_img_url_1" value="' . $imgUrl  . '" placeholder="Write Something Here!" hidden>';
		echo '</div>';
	}


	public function settingPageField2()
	{

		$imgUrl = get_option('hero_img_url_2');

		echo '<div class="col-12 col-md-4">';
		echo '<img class="w-100 h-100 js_custom_upload_media_hero js_custom_upload_media_multiple_img_2" src="' . $imgUrl . '" alt="pic" />';
		echo '<input type="text" class="form-control js_custom_upload_media__hero_input_2" name="hero_img_url_2" value="' . $imgUrl  . '" placeholder="Write Something Here!" hidden>';
		echo '</div>';
	}


	public function settingPageField3()
	{

		$imgUrl = get_option('hero_img_url_3');

		echo '<div class="col-12 col-md-4">';
		echo '<img class="w-100 h-100 js_custom_upload_media_hero js_custom_upload_media_multiple_img_3" src="' . $imgUrl . '" alt="pic" />';
		echo '<input type="text" class="form-control js_custom_upload_media__hero_input_3" name="hero_img_url_3" value="' . $imgUrl  . '" placeholder="Write Something Here!" hidden>';
		echo '</div>';
	}


	public function settingPageField4()
	{

		$imgUrl = get_option('hero_img_url_4');

		echo '<div class="col-12 col-md-4">';
		echo '<img class="w-100 h-100 js_custom_upload_media_hero js_custom_upload_media_multiple_img_4" src="' . $imgUrl . '" alt="pic" />';
		echo '<input type="text" class="form-control js_custom_upload_media__hero_input_4" name="hero_img_url_4" value="' . $imgUrl  . '" placeholder="Write Something Here!" hidden>';
		echo '</div>';
	}

	public function settingPageField5()
	{

		$imgUrl = get_option('hero_img_url_5');

		echo '<div class="col-12 col-md-4">';
		echo '<img class="w-100 h-100 js_custom_upload_media_hero js_custom_upload_media_multiple_img_5" src="' . $imgUrl . '" alt="pic" />';
		echo '<input type="text" class="form-control js_custom_upload_media__hero_input_5" name="hero_img_url_5" value="' . $imgUrl  . '" placeholder="Write Something Here!" hidden>';
		echo '</div>';
	}
}
