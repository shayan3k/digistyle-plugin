<?php

/**
 * @package  ShayaNNN
 */

namespace Inc\Pages;

use Inc\Api\SettingsApi;
use Inc\Base\BaseController;
use Inc\Api\Callbacks\AdminCallbacks;

/**
 * 
 */
class Admin extends BaseController
{
	public $settings;

	public $callbacks;

	public $pages = array();

	public $subpages = array();

	public function register()
	{
		$this->settings = new SettingsApi();

		$this->callbacks = new AdminCallbacks();

		$this->setPages();

		$this->setSubpages();

		$this->setSettings();
		$this->setSections();
		$this->setFields();

		$this->settings->addPages($this->pages)->withSubPage('Digistyle')->addSubPages($this->subpages)->register();
	}

	public function setPages()
	{
		$this->pages = array(
			array(
				'page_title' => 'Digistyle',
				'menu_title' => 'Digistyle',
				'capability' => 'manage_options',
				'menu_slug' => 'setting_page',
				'callback' => array($this->callbacks, 'settingTemplate'),
				'icon_url' => 'dashicons-store',
				'position' => 110
			)
		);
	}

	public function setSubpages()
	{
		$this->subpages = array(
			array(
				'parent_slug' => 'setting_page',
				'page_title' => 'Sample SubPage',
				'menu_title' => 'SubPage',
				'capability' => 'manage_options',
				'menu_slug' => 'sample_subPage',
				'callback' => array($this->callbacks, 'subPageTemplate')
			)
		);
	}

	public function setSettings()
	{
		$args = array(
			array(
				'option_group' => 'setting_page_options_group',
				'option_name' => 'hero_img_url_0',
				'callback' => array($this->callbacks, 'TextExampleSanetize')
			),
			array(
				'option_group' => 'setting_page_options_group',
				'option_name' => 'hero_img_url_1',
				'callback' => array($this->callbacks, 'TextExampleSanetize')
			),
			array(
				'option_group' => 'setting_page_options_group',
				'option_name' => 'hero_img_url_2',
				'callback' => array($this->callbacks, 'TextExampleSanetize')
			),
			array(
				'option_group' => 'setting_page_options_group',
				'option_name' => 'hero_img_url_3',
				'callback' => array($this->callbacks, 'TextExampleSanetize')
			),
			array(
				'option_group' => 'setting_page_options_group',
				'option_name' => 'hero_img_url_4',
				'callback' => array($this->callbacks, 'TextExampleSanetize')
			),
			array(
				'option_group' => 'setting_page_options_group',
				'option_name' => 'hero_img_url_5',
				'callback' => array($this->callbacks, 'TextExampleSanetize')
			)
		);

		$this->settings->setSettings($args);
	}

	public function setSections()
	{
		$args = array(
			array(
				'id' => 'admin-setting-section-id',
				'title' => 'Settings',
				'callback' => array($this->callbacks, 'settingPageSections'),
				'page' => 'setting_page'
			)
		);

		$this->settings->setSections($args);
	}

	public function setFields()
	{
		$args = array(
			array(
				'id' => 'hero_img_url_0',
				'title' => 'Hero Img Zero',
				'callback' => array($this->callbacks, 'settingPageField0'),
				'page' => 'setting_page',
				'section' => 'admin-setting-section-id',
				'args' => array(
					'label_for' => 'hero_img_url_0',
					'class' => 'example-class'
				)

			), array(
				'id' => 'hero_img_url_1',
				'title' => 'Hero Img One',
				'callback' => array($this->callbacks, 'settingPageField1'),
				'page' => 'setting_page',
				'section' => 'admin-setting-section-id',
				'args' => array(
					'label_for' => 'hero_img_url_1',
					'class' => 'example-class'
				)

			), array(
				'id' => 'hero_img_url_2',
				'title' => 'Hero Img Two',
				'callback' => array($this->callbacks, 'settingPageField2'),
				'page' => 'setting_page',
				'section' => 'admin-setting-section-id',
				'args' => array(
					'label_for' => 'hero_img_url_2',
					'class' => 'example-class'
				)

			), array(
				'id' => 'hero_img_url_3',
				'title' => 'Hero Img Three',
				'callback' => array($this->callbacks, 'settingPageField3'),
				'page' => 'setting_page',
				'section' => 'admin-setting-section-id',
				'args' => array(
					'label_for' => 'hero_img_url_3',
					'class' => 'example-class'
				)

			), array(
				'id' => 'hero_img_url_4',
				'title' => 'Hero Img Fourth',
				'callback' => array($this->callbacks, 'settingPageField4'),
				'page' => 'setting_page',
				'section' => 'admin-setting-section-id',
				'args' => array(
					'label_for' => 'hero_img_url_4',
					'class' => 'example-class'
				)

			), array(
				'id' => 'hero_img_url_5',
				'title' => 'Hero Img Fifth',
				'callback' => array($this->callbacks, 'settingPageField5'),
				'page' => 'setting_page',
				'section' => 'admin-setting-section-id',
				'args' => array(
					'label_for' => 'hero_img_url_5',
					'class' => 'example-class'
				)

			),

		);

		$this->settings->setFields($args);
	}
}
