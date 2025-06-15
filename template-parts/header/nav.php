<?php $home_id = get_option('page_on_front'); ?>

<header class="site-header">

	<div class="nav-bg">
		<div class="nav-container container">
			<div class="logo">
				<a href="<?php echo home_url(); ?>">
					<?php
					$logo = get_field('logo', $home_id);
					if ($logo):
					?>
						<img src="<?php echo esc_url($logo['url']); ?>" alt="Logo">
					<?php endif; ?>
				</a>
			</div>
			<div class="nav-content">
				<div class="nav-top">
					<div class="contact">
						<span>📞 Call: <?php the_field('phone_call', $home_id);  ?></span>
						<span>📱 Text: <?php the_field('phone_text', $home_id); ?></span>
						<span>📅 <a href="<?php the_field('book_online_link', $home_id); ?>">Book Online</a></span>
						<span>📍 <a href="<?php the_field('directions_link', $home_id); ?>">Directions</a></span>
					</div>
					<div class="socials">
						<a href="<?php the_field('facebook', $home_id); ?>">Fb</a>
						<a href="<?php the_field('instagram', $home_id); ?>">Ig</a>
						<a href="<?php the_field('yelp', $home_id); ?>">Yelp</a>
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