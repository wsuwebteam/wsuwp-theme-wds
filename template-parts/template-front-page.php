<main class="wsu-wrapper-content<?php if ( WSUWP\Theme\WDS\Sidebars::has() ) : ?> wsu-wrapper-content--has-sidebar<?php endif; ?>">
	<div class="wsu-page-content">
		<?php
		if ( have_posts() ) {

			while ( have_posts() ) {

				the_post();

				echo '<article class="wsu-article">';

					if ( 'before' === apply_filters( 'wsu_wds_template_option', '', 'hero_position', 'home' ) ) {

						get_template_part( 'template-parts/template-hero', get_post_type() );

					}

					get_template_part( 'template-parts/template-front-page-header', get_post_type() );

					if ( 'after' === apply_filters( 'wsu_wds_template_option', '', 'hero_position', 'home' ) ) {

						get_template_part( 'template-parts/template-hero', get_post_type() );

					}

					get_template_part( 'template-parts/template-front-page-content', get_post_type() );

					get_template_part( 'template-parts/template-front-page-footer', get_post_type() );

				echo '</article>';

			} // end while
		}  ;?>
	</div>
	<?php get_template_part( 'template-parts/template-sidebar', get_post_type() ); ?>
</main>