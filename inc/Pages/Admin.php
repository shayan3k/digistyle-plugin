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

		$this->settings->addPages($this->pages)->withSubPage('Dashboard')->addSubPages($this->subpages)->register();
	}

	public function setPages()
	{
		$this->pages = array(
			array(
				'page_title' => 'Sample Page Dashboard',
				'menu_title' => 'Dashboard',
				'capability' => 'manage_options',
				'menu_slug' => 'sample_page',
				'callback' => array($this->callbacks, 'dashboardTemplate'),
				'icon_url' => 'dashicons-store',
				'position' => 110
			)
		);
	}

	public function setSubpages()
	{
		$this->subpages = array(
			array(
				'parent_slug' => 'sample_page',
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
				'option_group' => 'sample_options_group',
				'option_name' => 'text_example',
				'callback' => array($this->callbacks, 'alecadddOptionsGroup')
			),
			array(
				'option_group' => 'sample_options_group',
				'option_name' => 'first_name'
			)
		);

		$this->settings->setSettings($args);
	}

	public function setSections()
	{
		$args = array(
			array(
				'id' => 'alecaddd_admin_index',
				'title' => 'Settings',
				'callback' => array($this->callbacks, 'alecadddAdminSection'),
				'page' => 'sample_page'
			)
		);

		$this->settings->setSections($args);
	}

	public function setFields()
	{
		$args = array(
			array(
				'id' => 'text_example',
				'title' => 'Text Example',
				'callback' => array($this->callbacks, 'alecadddTextExample'),
				'page' => 'sample_page',
				'section' => 'alecaddd_admin_index',
				'args' => array(
					'label_for' => 'text_example',
					'class' => 'example-class'
				)
			),
			array(
				'id' => 'first_name',
				'title' => 'First Name',
				'callback' => array($this->callbacks, 'alecadddFirstName'),
				'page' => 'sample_page',
				'section' => 'alecaddd_admin_index',
				'args' => array(
					'label_for' => 'first_name',
					'class' => 'example-class'
				)
			)
		);

		$this->settings->setFields($args);
	}
}
