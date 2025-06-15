<?php

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
