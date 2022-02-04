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

					get_template_part( 'template-parts/template-header', 'home', array( 'context' => 'home' ) );

					get_template_part( 'template-parts/template-content', 'home', array( 'context' => 'home' ) );

					get_template_part( 'template-parts/template-footer', 'home', array( 'context' => 'home' ) );

					echo '</article>';

				} // end while
			}; ?>
			</main>
			<?php get_template_part( 'template-parts/template-sidebar', 'home', array( 'context' => 'home' ) ); ?>
		</div>
		<?php get_template_part( 'template-component/component-site-footer', get_post_type() ); ?>
		<!-- SITE CONTAINER:END -->
	</div>
	<!-- SITE WRAPPER:END -->
	<?php get_template_part( 'template-component/component-global-footer', get_post_type() ); ?>
</div>
<!-- GLOBAL CONTAINER:END -->
<?php get_footer(); ?>
