<?php
$home_id = get_option('page_on_front');

// Background fallback
$bg = get_field('services_background', $home_id);
$bg_url = is_array($bg) && !empty($bg['url']) ? $bg['url'] : get_template_directory_uri() . '/assets/images/services-bg.jpg';

// Content fallbacks
$heading = get_field('services_heading', $home_id) ?: 'Our Services';
$btn_text = get_field('services_button_text', $home_id) ?: 'Book Online';
$btn_link = get_field('services_button_link', $home_id) ?: '#booking';
?>

<section class="services" id="services" style="background-image: url('<?php echo esc_url($bg_url); ?>')">
	<div class="overlay">
		<div class="services-container container">
			<div class="services-header" data-aos='fade-up' data-aos-duration='800'>
				<h2 class="cg-bold" data-aos='fade-up-right' data-aos-duration='800'><?php echo esc_html($heading); ?></h2>
				<a href="<?php echo esc_url($btn_link); ?>" class="btn cg-regular" data-aos='fade-in' data-aos-duration='800' data-aos-delay='300'><?php echo esc_html($btn_text); ?></a>
			</div>
			<div class="services-all" data-aos="fade-up" data-aos-duration="800" data-aos-delay="500">
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
							<div class="service-header cg-bold">
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