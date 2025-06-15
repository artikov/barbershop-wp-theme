<?php
$home_id = get_option('page_on_front');
?>

<section class="faq" id="faq">
	<div class="faq-container container">
		<h2 class="faq-heading">Frequently Asked Questions (FAQs)</h2>
		<div class="faq-accordion">
			<?php
			$faq_items = new WP_Query([
				'post_type' => 'faq_item',
				'posts_per_page' => -1,
				'order' => 'ASC',
				'orderby' => 'menu_order'
			]);

			if ($faq_items->have_posts()) :
				while ($faq_items->have_posts()) : $faq_items->the_post();
			?>
					<div class="accordion-item">
						<h3 class="accordion-header"><?php the_title(); ?></h3>
						<div class="accordion-content">
							<?php the_content(); ?>
						</div>
					</div>
			<?php
				endwhile;
				wp_reset_postdata();
			else :
				echo '<p>' . __('No FAQs found.', 'barbershop-theme') . '</p>';
			endif;
			?>
		</div>
	</div>
</section>