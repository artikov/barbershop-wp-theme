<?php
$home_id = get_option('page_on_front');

// Background fallback
$bg = get_field('reviews_background', $home_id);
$bg_url = is_array($bg) && !empty($bg['url']) ? $bg['url'] : get_template_directory_uri() . '/assets/images/reviews-bg.jpg';

// Content fallback
$heading = get_field('reviews_heading', $home_id) ?: 'Client Reviews';
$embed_code = get_field('reviews_embed', $home_id);

// Default Elfsight embed if none set in ACF
if (empty($embed_code)) {
	$embed_code = <<<HTML
<!-- Elfsight Google Reviews | Untitled Google Reviews -->
<script src="https://static.elfsight.com/platform/platform.js" async></script>
<div class="elfsight-app-3ecf6388-6c49-456b-b24a-0c06c5fb2800" data-elfsight-app-lazy></div>
HTML;
}
?>

<section class="reviews" id="reviews" style="background-image: url('<?php echo esc_url($bg_url); ?>')">
	<div class="overlay">
		<div class="reviews-container container">
			<h2 class="reviews-heading cg-bold"><?php echo esc_html($heading); ?></h2>
			<div class="reviews-embed" data-aos='fade-right' data-aos-duration='800'>
				<?php echo $embed_code; ?>
			</div>
		</div>
	</div>
</section>