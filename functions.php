<?php

add_theme_support('post-thumbnails');

function barbershop_enqueue_assets()
{
	wp_enqueue_style(
		'barbershop-style',
		get_template_directory_uri() . '/assets/css/style.css'
	);
	wp_enqueue_style('nav', get_template_directory_uri() . '/assets/css/nav.css');
	wp_enqueue_style('hero', get_template_directory_uri() . '/assets/css/hero.css');

	// ✅ AOS CSS
	wp_enqueue_style('aos-css', 'https://unpkg.com/aos@2.3.1/dist/aos.css', [], '2.3.1');

	// ✅ AOS JS
	wp_enqueue_script('aos-js', 'https://unpkg.com/aos@2.3.1/dist/aos.js', [], '2.3.1', true);

	// ✅ AOS Init
	wp_add_inline_script('aos-js', 'AOS.init();');

	// ✅ Font Awesome
	wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css');
}

add_action('wp_enqueue_scripts', 'barbershop_enqueue_assets');

function barbershop_register_menus()
{
	register_nav_menus([
		'main_menu' => __('Main Menu', 'barbershop-theme'),
		'footer_menu' => __('Footer Menu', 'barbershop-theme')
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

function barbershop_register_faq_post_type()
{
	register_post_type('faq_item', [
		'labels' => [
			'name' => __('FAQs'),
			'singular_name' => __('FAQ Item')
		],
		'public' => true,
		'menu_icon' => 'dashicons-editor-help',
		'has_archive' => false,
		'supports' => ['title', 'editor']
	]);
}
add_action('init', 'barbershop_register_faq_post_type');
