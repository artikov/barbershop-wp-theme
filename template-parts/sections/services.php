<?php
$home_id = get_option('page_on_front');
$bg = get_field('services_background', $home_id);
$bg_url = is_array($bg) ? $bg['url'] : $bg;
?>

<section class="services" id="services" style="background-image: url('<?php echo esc_url($bg_url); ?>')">
	<div class="overlay">
		<div class="services-container container">
			<div class="services-header">
				<h2>
					<?php the_field('services_heading', $home_id); ?>
				</h2>
				<a href="<?php the_field('services_button_link', $home_id); ?>" class="btn"><?php the_field('services_button_text', $home_id); ?></a>
			</div>
			<div class="services-all">
				<?php
				$services = new WP_Query([
					'post_type' => 'service',
					'posts_per_page' => -1
				]);

				if ($services->have_posts()) :
					while ($services->have_posts()) : $services->the_post();
						$price = get_field('price');
				?>
						<div class="service-box">
							<div class="service-header">
								<h3><?php the_title(); ?></h3>
								<div class="dotted-line"></div>
								<span class="price">$<?php echo esc_html($price); ?></span>
							</div>
							<p><?php the_content(); ?></p>
						</div>
				<?php
					endwhile;
					wp_reset_postdata();
				else :
					echo '<p>No services added yet.</p>';
				endif;
				?>
			</div>
		</div>
	</div>
</section>