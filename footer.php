<?php $home_id = get_option('page_on_front'); ?>

<?php wp_footer(); ?>
<footer>
	<div class="container footer-container">

		<div class="footer-info">
			<div class="footer-logo">
				<a href="<?php echo home_url(); ?>">
					<?php
					$logo = get_field('footer_logo', $home_id);
					if ($logo):
					?>
						<img src="<?php echo esc_url($logo['url']); ?>" alt="Logo">
					<?php endif; ?>
				</a>
			</div>
			<p class="footer-address">
				<?php the_field('footer_address', $home_id); ?>
			</p>
		</div>
		<div class="footer-hours">
			<h3>Working Hours</h3>
			<?php the_field('footer_hours', $home_id); ?>
		</div>
		<div class="footer-links">
			<h3>Quick Links</h3>
			<?php
			wp_nav_menu([
				'theme_location' => 'footer_menu',
				'container' => false,
				'menu_class' => 'footer-menu',
			]);
			?>
		</div>
		<div class="footer-location">
			<h3>Directions</h3>
			<div class="map">
				<?php echo get_field('footer_map', $home_id); ?>
			</div>
		</div>
	</div>
</footer>

</body>

</html>