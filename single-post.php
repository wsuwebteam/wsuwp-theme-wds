<?php namespace WSUWP\Theme\WDS; 

/**
 * Page Template
 */

?>
<?php get_header(); ?>
<!-- GLOBAL CONTAINER:START -->
<div class="wsu-wrapper-global">
	<?php get_template_part( 'template-component/component-global-header', get_post_type() ); ?>
	<?php get_template_part( 'template-component/component-site-navigation-vertical', get_post_type() ); ?>
	<!-- SITE WRAPPER:START -->
	<div class="wsu-wrapper-site">
		<!-- SITE CONTAINER:START -->
		<?php get_template_part( 'template-component/component-site-header', get_post_type() ); ?>
		<div class="wsu-wrapper-content">
			<main role="main" id="wsu-content" class="wsu-wrapper-main" tabindex="-1">
			<?php
			if ( have_posts() ) {

				while ( have_posts() ) {

					the_post();

					echo '<article class="wsu-article">';

					if ( 'before' === apply_filters( 'wsu_wds_template_option', '', 'hero_position', get_post_type() ) ) {

						get_template_part( 'template-parts/template-hero', get_post_type(), array( 'context' => get_post_type() ) );

					}

					get_template_part( 'template-parts/template-header', 'post', array( 'context' => 'post' ) );

					if ( 'after' === apply_filters( 'wsu_wds_template_option', '', 'hero_position', get_post_type() ) ) {

						get_template_part( 'template-parts/template-hero', get_post_type(), array( 'context' => get_post_type() ) );

					}

					get_template_part( 'template-parts/template-content', 'post', array( 'context' => 'post' ) );

					get_template_part( 'template-parts/template-footer', 'post', array( 'context' => 'post' ) );

					echo '</article>';

				} // end while
			}; ?>
			</main>
			<?php get_template_part( 'template-parts/template-sidebar', get_post_type(), array( 'context' => 'post' ) ); ?>
		</div>
		<?php get_template_part( 'template-component/component-site-footer', get_post_type() ); ?>
		<!-- SITE CONTAINER:END -->
	</div>
	<!-- SITE WRAPPER:END -->
	<?php get_template_part( 'template-component/component-global-footer', get_post_type() ); ?>
</div>
<!-- GLOBAL CONTAINER:END -->
<?php get_footer(); ?>