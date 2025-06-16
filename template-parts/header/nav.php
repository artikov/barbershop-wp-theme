<?php
$home_id = get_option('page_on_front');
$logo = get_field('logo', $home_id);
$phone_call = get_field('phone_call', $home_id) ?: '713-953-7777';
$phone_text = get_field('phone_text', $home_id) ?: '713-281-1917';
$book_online_link = get_field('book_online_link', $home_id) ?: '#';
$directions_link = get_field('directions_link', $home_id) ?: '#';
$facebook = get_field('facebook', $home_id) ?: '#';
$instagram = get_field('instagram', $home_id) ?: '#';
$yelp = get_field('yelp', $home_id) ?: '#';
?>

<header class="site-header">
	<div class="nav-bg">
		<div class="nav-container">
			<div class="logo">
				<a href="<?php echo home_url(); ?>">
					<?php if ($logo): ?>
						<img src="<?php echo esc_url($logo['url']); ?>" alt="Logo">
					<?php else: ?>
						<span style="color:white; font-weight:bold;">007 BARBER SHOP</span>
					<?php endif; ?>
				</a>
			</div>
			<div class="nav-content">
				<div class="nav-top">
					<div class="contact">
						<div>
							<i class="fas fa-phone"></i>
							<a href="tel:<?php echo esc_attr($phone_call); ?>">
								Call: <?php echo esc_html($phone_call); ?>
							</a>
						</div>
						<div>
							<i class="fas fa-comment-dots"></i>
							<a href="sms:<?php echo esc_attr($phone_text); ?>">
								Text: <?php echo esc_html($phone_text); ?>
							</a>
						</div>
						<div>
							<i class="fas fa-calendar-check"></i>
							<a href="<?php echo esc_url($book_online_link); ?>">Book Online</a>
						</div>
						<div>
							<i class="fa-solid fa-map-location-dot"></i>
							<a href="<?php echo esc_url($directions_link); ?>">Directions</a>
						</div>
					</div>
					<div class="socials">
						<a href="<?php echo esc_url($facebook); ?>">
							<i class="fa-brands fa-facebook-f"></i>
						</a>
						<a href="<?php echo esc_url($instagram); ?>">
							<i class="fa-brands fa-instagram"></i>
						</a>
						<a href="<?php echo esc_url($yelp); ?>"><i class="fa-brands fa-yelp"></i></a>
					</div>
				</div>
				<nav class="menu">
					<?php
					wp_nav_menu([
						'theme_location' => 'main_menu',
						'container' => false,
						'menu_class' => 'menu'
					]);
					?>
				</nav>
			</div>
		</div>
	</div>
</header>