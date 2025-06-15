<?php
$home_id = get_option('page_on_front');
$bg = get_field('hero_background', $home_id);
$bg_url = is_array($bg) ? $bg['url'] : $bg;
?>


<section class="hero" id="home" style="background-image: url('<?php echo esc_url($bg_url); ?>')">
	<div class="overlay">
		<div class="container">
			<div class="hero-content">
				<div class="hero-container">
					<span class="hero-label"><?php the_field('hero_label', $home_id); ?></span>
					<h1 class="hero-heading"><?php the_field('hero_heading', $home_id); ?></h1>
					<p class="hero-subheading"><?php the_field('hero_subheading', $home_id); ?></p>
					<div class="hero-buttons">
						<?php if (get_field('hero_button_1_link', $home_id)): ?>
							<a href="<?php the_field('hero_button_1_link', $home_id); ?>" class="btn"><?php the_field('hero_button_1_text', $home_id); ?></a>
						<?php endif; ?>
						<?php if (get_field('hero_button_2_link', $home_id)): ?>
							<a href="<?php the_field('hero_button_2_link', $home_id); ?>" class="btn alt"><?php the_field('hero_button_2_text', $home_id); ?></a>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
</header>