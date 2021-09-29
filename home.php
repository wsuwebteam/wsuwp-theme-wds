<?php namespace WSUWP\Theme\WDS; ?>
<?php get_header(); ?>
<!-- GLOBAL CONTAINER:START -->
<div class="wsu-wrapper-global">
	<?php get_template_part( 'template-component/component-global-header', get_post_type() ); ?>
	<?php get_template_part( 'template-parts/site-navigation-vertical', get_post_type() ); ?>
	<!-- SITE WRAPPER:START -->
	<div class="wsu-wrapper-site">
		<!-- SITE CONTAINER:START -->
		<?php get_template_part( 'template-component/component-site-header', get_post_type() ); ?>
		hello world
		<?php get_template_part( 'template-parts/template-home', get_post_type() ); ?>
		<?php get_template_part( 'template-component/component-site-footer', get_post_type() ); ?>
		<!-- SITE CONTAINER:END -->
	</div>
	<!-- SITE WRAPPER:END -->
    <?php get_template_part( 'template-component/component-global-footer', get_post_type() ); ?>
</div>
<!-- GLOBAL CONTAINER:END -->
<?php get_footer(); ?>
