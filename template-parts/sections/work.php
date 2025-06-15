<?php
$home_id = get_option('page_on_front');
$bg = get_field('work_background', $home_id);
$bg_url = is_array($bg) ? $bg['url'] : $bg;
?>
<section class="work" id="work" style="background-image: url('<?php echo esc_url($bg_url); ?>')">
	<div class="overlay">
		<div class="work-container container">
			<div class="work-header">
				<h2>
					<?php the_field('work_heading', $home_id); ?>
				</h2>
				<a href="<?php the_field('work_button_link', $home_id); ?>" class="btn"><?php the_field('work_button_text', $home_id); ?></a>
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
					echo '<p>No work items found.</p>';
				endif;
				?>
			</div>
		</div>
	</div>
</section>