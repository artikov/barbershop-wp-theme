<?php
$home_id = get_option('page_on_front');

// Background fallback
$bg = get_field('work_background', $home_id);
$bg_url = is_array($bg) && !empty($bg['url']) ? $bg['url'] : get_template_directory_uri() . '/assets/images/work-bg.webp';

// Content fallback
$heading = get_field('work_heading', $home_id) ?: 'Our Work';
$btn_text = get_field('work_button_text', $home_id) ?: 'Book Online';
$btn_link = get_field('work_button_link', $home_id) ?: '#booking';

// Default image
$default_img = get_template_directory_uri() . '/assets/images/IMG_9241.webp';
?>

<section class="work" id="work" style="background-image: url('<?php echo esc_url($bg_url); ?>')">
	<div class="overlay">
		<div class="work-container container">
			<div class="work-header">
				<h2 class="cg-bold"><?php echo esc_html($heading); ?></h2>
				<a href="<?php echo esc_url($btn_link); ?>" class="btn" data-aos="fade-in" data-aos-duration="800"><?php echo esc_html($btn_text); ?></a>
			</div>
			<div class="work-gallery">
				<?php
				$works = new WP_Query([
					'post_type' => 'work_item',
					'posts_per_page' => -1
				]);

				if ($works->have_posts()) :
					while ($works->have_posts()) : $works->the_post();
						if (has_post_thumbnail()) :
				?>
							<div class="gallery-item">
								<img src="<?php the_post_thumbnail_url('large'); ?>" alt="<?php the_title(); ?>">
							</div>
						<?php
						endif;
					endwhile;
					wp_reset_postdata();
				else :
					// Repeat the same image 5 times
					for ($i = 1; $i <= 5; $i++) :
						?>
						<div class="gallery-item">
							<img src="<?php echo esc_url($default_img); ?>" alt="Default Work Image">
						</div>
				<?php endfor;
				endif;
				?>
			</div>
		</div>
	</div>
</section>