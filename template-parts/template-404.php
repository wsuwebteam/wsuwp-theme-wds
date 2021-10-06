<div class="wsu-wrapper-content">
	<main role="main" id="wsu-content" class="wsu-wrapper-main" tabindex="-1">
	<?php
	if ( have_posts() ) {

		while ( have_posts() ) {

			the_post();

			echo '<article class="wsu-article">';

			if ( 'before' === apply_filters( 'wsu_wds_template_option', '', 'hero_position', 'single' ) ) {

				get_template_part( 'template-parts/template-hero', get_post_type() );

			}

			get_template_part( 'template-parts/template-single-header', get_post_type() );

			if ( 'after' === apply_filters( 'wsu_wds_template_option', '', 'hero_position', 'single' ) ) {

				get_template_part( 'template-parts/template-hero', get_post_type() );

			}

			get_template_part( 'template-parts/template-single-content', get_post_type() );

			get_template_part( 'template-parts/template-single-footer', get_post_type() );

			echo '</article>';

		} // end while
	}  ;?>
	</main>
	<?php get_template_part( 'template-parts/template-sidebar', get_post_type() ); ?>
</div>