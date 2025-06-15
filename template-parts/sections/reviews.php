<?php
$home_id = get_option('page_on_front');
$bg = get_field('reviews_background', $home_id);
$bg_url = is_array($bg) ? $bg['url'] : $bg;
?>

<section class="reviews" id="reviews" style="background-image: url('<?php echo esc_url($bg_url); ?>')">
	<div class="overlay">
		<div class="reviews-container container">
			<h2 class="reviews-heading"><?php the_field('reviews_heading', $home_id); ?></h2>
			<div class="reviews-embed">
				<?php echo get_field('reviews_embed', $home_id); ?>
			</div>
		</div>
	</div>
</section>