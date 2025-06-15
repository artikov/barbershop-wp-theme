<?php

add_theme_support('post-thumbnails');

function barbershop_enqueue_assets()
{
	wp_enqueue_style(
		'barbershop-google-fonts',
		'https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap',
		false
	);

	wp_enqueue_style(
		'barbershop-style',
		get_template_directory_uri() . '/assets/css/style.css',
		['barbershop-google-fonts'],
		filemtime(get_template_directory() . '/assets/css/style.css')
	);
}

add_action('wp_enqueue_scripts', 'barbershop_enqueue_assets');

function barbershop_register_menus()
{
	register_nav_menus([
		'main_menu' => __('Main Menu', 'barbershop-theme')
	]);
}
add_action('after_setup_theme', 'barbershop_register_menus');

function barbershop_register_services_post_type()
{
	register_post_type('service', [
		'labels' => [
			'name' => __('Services'),
			'singular_name' => __('Service')
		],
		'public' => true,
		'menu_icon' => 'dashicons-scissors',
		'has_archive' => false,
		'rewrite' => ['slug' => 'services'],
		'supports' => ['title', 'editor']
	]);
}
add_action('init', 'barbershop_register_services_post_type');

function barbershop_register_work_post_type()
{
	register_post_type('work_item', [
		'labels' => [
			'name' => __('Our Work'),
			'singular_name' => __('Work Item')
		],
		'public' => true,
		'menu_icon' => 'dashicons-format-gallery',
		'has_archive' => false,
		'supports' => ['title', 'editor', 'thumbnail'] // ← this is key!
	]);
}
add_action('init', 'barbershop_register_work_post_type');
