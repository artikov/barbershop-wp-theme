<?php $home_id = get_option('page_on_front'); ?>
<?php wp_footer(); ?>

<footer>
	<div class="container footer-container">

		<!-- Logo & Address -->
		<div class="footer-info">
			<div class="footer-logo">
				<a href="<?php echo home_url(); ?>">
					<?php
					$logo = get_field('footer_logo', $home_id);
					if ($logo) :
						echo '<img src="' . esc_url($logo['url']) . '" alt="Logo">';
					else :
						echo '<img src="' . get_template_directory_uri() . '/assets/images/logo-footer.png" alt="Default Logo">';
					endif;
					?>
				</a>
			</div>
			<p class="footer-address">
				<?php
				$address = get_field('footer_address', $home_id);
				echo esc_html($address ?: '5801 Memorial Dr<br>Suite B, Houston, TX 77007');
				?>
			</p>
		</div>

		<!-- Working Hours -->
		<div class="footer-hours">
			<h3 class="cg-bold">Working Hours</h3>
			<?php
			$hours = get_field('footer_hours', $home_id);
			echo $hours ?: '<ul>
				<li>Monday 11am – 8pm</li>
				<li>Tues – Thu 9am – 7pm</li>
				<li>Fri – Sat 9am – 8pm</li>
				<li>Sunday 9:30am – 6pm</li>
			</ul>';
			?>
		</div>

		<!-- Quick Links -->
		<div class="footer-links">
			<h3 class="cg-bold">Quick Links</h3>
			<?php
			wp_nav_menu([
				'theme_location' => 'footer_menu',
				'container' => false,
				'menu_class' => 'footer-menu',
			]);
			?>
		</div>

		<!-- Map / Directions -->
		<div class="footer-location">
			<h3 class="cg-bold">Directions</h3>
			<div class="map">
				<?php
				$map = get_field('footer_map', $home_id);
				echo $map ?: '
				<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d241959.67675860258!2d-95.21525640997152!3d29.666307294313047!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2s!4v1750002605961!5m2!1sen!2s"
				width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
				referrerpolicy="no-referrer-when-downgrade"></iframe>';
				?>
			</div>
		</div>

	</div>
</footer>

</body>

</html>