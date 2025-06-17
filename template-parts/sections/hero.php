<?php
$home_id = get_option('page_on_front');

// Background image fallback
$bg = get_field('hero_background', $home_id);
$bg_url = is_array($bg) && !empty($bg['url']) ? $bg['url'] : get_template_directory_uri() . '/assets/images/hero-bg.jpg';

// Default values
$label = get_field('hero_label', $home_id) ?: '007 BARBERSHOP';
$heading = get_field('hero_heading', $home_id) ?: 'Houston’s Top Barbershop For Skin Fades, Classic Haircuts & Beard Care';
$subheading = get_field('hero_subheading', $home_id) ?: 'More than a cut. It’s how Houston stays sharp.';
$btn1_text = get_field('hero_button_1_text', $home_id) ?: 'Services & Pricing';
$btn1_link = get_field('hero_button_1_link', $home_id) ?: '#services';
$btn2_text = get_field('hero_button_2_text', $home_id) ?: 'Our Work';
$btn2_link = get_field('hero_button_2_link', $home_id) ?: '#work';

// Split heading after 3 words
$words = explode(' ', $heading);
$first_line = implode(' ', array_slice($words, 0, 3));
$second_line = implode(' ', array_slice($words, 3));
?>

<section class="hero" id="home" style="background-image: url('<?php echo esc_url($bg_url); ?>')">
	<div class="overlay">
		<div class="hero-content">
			<div class="hero-container">
				<span class="hero-label" data-aos="fade-left" data-aos-duration="800"><?php echo esc_html($label); ?></span>
				<h1 class="hero-heading cg-bold" data-aos="fade-right" data-aos-duration="800">
					<?php echo esc_html($first_line); ?><br>
					<?php echo esc_html($second_line); ?>
				</h1>
				<p class="hero-subheading"><?php echo esc_html($subheading); ?></p>
				<div class="hero-buttons cg-regular" data-aos="fade-in" data-aos-duration="800" data-aos-offset="0">
					<a href="<?php echo esc_url($btn1_link); ?>" class="btn"><?php echo esc_html($btn1_text); ?></a>
					<a href="<?php echo esc_url($btn2_link); ?>" class="btn"><?php echo esc_html($btn2_text); ?></a>
				</div>
			</div>
		</div>
	</div>
</section>