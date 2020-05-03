<?php

/**
 * @package  ShayaNNN
 */

namespace Inc\Base;

use Inc\PostTypes\wp_post_type_product;
use Inc\RestApi\RegisterRestApi;

class Settings
{
	protected $plugin;
	protected $plugin_path;

	public function __construct()
	{
		$this->plugin = PLUGIN;
		$this->plugin_path = PLUGIN_PATH;
	}

	public function register()
	{
		//register filters
		add_filter("plugin_action_links_$this->plugin", array($this, 'settings_link'));

		//register custom Post type for products
		add_action('init', array($this, 'register_custom_post_type'));

		//register custom taxanomy for products
		add_action('init', array($this, 'register_custom_taxanomy'), 0);

		//Register Rest Apis
		new RegisterRestApi();

		//register theme support
		$this->register_theme_support();

		//register all custom settings
		// add_action('widgets_init', [$this, 'register_widgets_custom']);
	}

	public function settings_link($links)
	{
		$settings_link = '<a href="admin.php?page=alecaddd_plugin">Settings</a>';
		array_push($links, $settings_link);
		return $links;
	}

	public function register_custom_post_type()
	{
		$product = new wp_post_type_product();
	}

	public function register_custom_taxanomy()
	{

		// Register Color Taxanomy
		$labels = array(
			'name'              => _x('Color', 'taxonomy general name', 'digistyle'),
			'singular_name'     => _x('Color', 'taxonomy singular name', 'digistyle'),
			'search_items'      => __('Search Color', 'digistyle'),
			'all_items'         => __('All Color', 'digistyle'),
			'edit_item'         => __('Edit Color', 'digistyle'),
			'update_item'       => __('Update Color', 'digistyle'),
			'add_new_item'      => __('Add New Color', 'digistyle'),
			'new_item_name'     => __('New Color Name', 'digistyle'),
			'menu_name'         => __('Color', 'digistyle'),
		);
		$args = array(
			'hierarchical'          => false,
			'labels'                => $labels,
			'show_ui'               => true,
			'show_admin_column'     => true,
			'query_var'             => true,
			'rewrite'               => array('slug' => 'color'),
		);

		register_taxonomy('color', 'wp_products', $args);

		// Register Size Taxanomy
		$labels = array(
			'name'              => _x('Size', 'taxonomy general name', 'digistyle'),
			'singular_name'     => _x('Size', 'taxonomy singular name', 'digistyle'),
			'search_items'      => __('Search Size', 'digistyle'),
			'all_items'         => __('All Size', 'digistyle'),
			'edit_item'         => __('Edit Size', 'digistyle'),
			'update_item'       => __('Update Size', 'digistyle'),
			'add_new_item'      => __('Add New Size', 'digistyle'),
			'new_item_name'     => __('New Size Name', 'digistyle'),
			'menu_name'         => __('Size', 'digistyle'),
		);
		$args = array(
			'hierarchical'          => false,
			'labels'                => $labels,
			'show_ui'               => true,
			'show_admin_column'     => true,
			'query_var'             => true,
			'rewrite'               => array('slug' => 'size'),
		);

		register_taxonomy('size', 'wp_products', $args);

		// Register Gender Taxanomy
		$labels = array(
			'name'              => _x('Gender', 'taxonomy general name', 'digistyle'),
			'singular_name'     => _x('Gender', 'taxonomy singular name', 'digistyle'),
			'search_items'      => __('Search Gender', 'digistyle'),
			'all_items'         => __('All Gender', 'digistyle'),
			'edit_item'         => __('Edit Gender', 'digistyle'),
			'update_item'       => __('Update Gender', 'digistyle'),
			'add_new_item'      => __('Add New Gender', 'digistyle'),
			'new_item_name'     => __('New Gender Name', 'digistyle'),
			'menu_name'         => __('Gender', 'digistyle'),
		);
		$args = array(
			'hierarchical'          => false,
			'labels'                => $labels,
			'show_ui'               => true,
			'show_admin_column'     => true,
			'query_var'             => true,
			'rewrite'               => array('slug' => 'gender'),
		);
		register_taxonomy('gender', 'wp_products', $args);



		// Register Type Taxanomy
		$labels = array(
			'name'              => _x('Type', 'taxonomy general name', 'digistyle'),
			'singular_name'     => _x('Type', 'taxonomy singular name', 'digistyle'),
			'search_items'      => __('Search Type', 'digistyle'),
			'all_items'         => __('All Type', 'digistyle'),
			'edit_item'         => __('Edit Type', 'digistyle'),
			'update_item'       => __('Update Type', 'digistyle'),
			'add_new_item'      => __('Add New Type', 'digistyle'),
			'new_item_name'     => __('New Type Name', 'digistyle'),
			'menu_name'         => __('Type', 'digistyle'),
		);
		$args = array(
			'hierarchical'          => false,
			'labels'                => $labels,
			'show_ui'               => true,
			'show_admin_column'     => true,
			'query_var'             => true,
			'rewrite'               => array('slug' => 'type'),
		);
		register_taxonomy('type', 'wp_products', $args);



		// Register Material Taxanomy
		$labels = array(
			'name'              => _x('Material', 'taxonomy general name', 'digistyle'),
			'singular_name'     => _x('Material', 'taxonomy singular name', 'digistyle'),
			'search_items'      => __('Search Material', 'digistyle'),
			'all_items'         => __('All Material', 'digistyle'),
			'edit_item'         => __('Edit Material', 'digistyle'),
			'update_item'       => __('Update Material', 'digistyle'),
			'add_new_item'      => __('Add New Material', 'digistyle'),
			'new_item_name'     => __('New Material Name', 'digistyle'),
			'menu_name'         => __('Material', 'digistyle'),
		);
		$args = array(
			'hierarchical'          => false,
			'labels'                => $labels,
			'show_ui'               => true,
			'show_admin_column'     => true,
			'query_var'             => true,
			'rewrite'               => array('slug' => 'matrial'),
		);
		register_taxonomy('matrial', 'wp_products', $args);


		// Register Material Taxanomy
		$labels = array(
			'name'              => _x('Brand', 'taxonomy general name', 'digistyle'),
			'singular_name'     => _x('Brand', 'taxonomy singular name', 'digistyle'),
			'search_items'      => __('Search Brand', 'digistyle'),
			'all_items'         => __('All Brand', 'digistyle'),
			'edit_item'         => __('Edit Brand', 'digistyle'),
			'update_item'       => __('Update Brand', 'digistyle'),
			'add_new_item'      => __('Add New Brand', 'digistyle'),
			'new_item_name'     => __('New Brand Name', 'digistyle'),
			'menu_name'         => __('Brand', 'digistyle'),
		);
		$args = array(
			'hierarchical'          => false,
			'labels'                => $labels,
			'show_ui'               => true,
			'show_admin_column'     => true,
			'query_var'             => true,
			'rewrite'               => array('slug' => 'brand'),
		);
		register_taxonomy('brand', 'wp_products', $args);
	}

	public function register_theme_support()
	{
		// add_theme_support('post-thumbnails');
	}

	public function register_widgets_custom()
	{
		// register_widget(customWidget::class);
	}
}
