<?php
$home_id = get_option('page_on_front');
$faq_heading = get_field('faq_heading', $home_id) ?: 'Frequently Asked Questions (FAQs)';
?>

<section class="faq" id="faq">
	<div class="faq-container container">
		<h2 class="faq-heading cg-bold"><?php echo esc_html($faq_heading); ?></h2>
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
						<h3 class="accordion-header cg-regular"><?php the_title(); ?></h3>
						<div class="accordion-content">
							<?php the_content(); ?>
						</div>
					</div>
				<?php
				endwhile;
				wp_reset_postdata();
			else :
				// Default fallback FAQs
				$default_faqs = [
					[
						'question' => "What’s the best men’s haircut to get in Houston right now?",
						'answer'   => "At 007 Barbershop, we’re seeing a lot of love for skin fades, burst fades, low tapers, and clean mullet fades. But truth is — the best haircut is the one that fits your face, your lifestyle, and your vibe. That’s why every cut starts with a quick consult and a mirror chat.",
					],
					[
						'question' => "How much does a haircut cost at 007 Barbershop?",
						'answer'   => "Most of our cuts fall between \$40–\$70, depending on the style and barber. We keep it transparent, always quote upfront, and make sure you leave knowing exactly what you’re paying for — expert fades, attention to detail, and a damn good experience.",
					],
				];

				foreach ($default_faqs as $faq) :
				?>
					<div class="accordion-item">
						<h3 class="accordion-header"><?php echo esc_html($faq['question']); ?></h3>
						<div class="accordion-content">
							<p><?php echo esc_html($faq['answer']); ?></p>
						</div>
					</div>
			<?php endforeach;
			endif;
			?>
		</div>
	</div>
</section>