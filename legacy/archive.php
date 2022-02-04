<?php namespace WSUWP\Theme\WDS; ?>
<?php get_header(); ?>
<!-- GLOBAL CONTAINER:START -->
<div class="wsu-wrapper-global">
	<?php get_template_part( 'template-component/component-global-header', 'archive' ); ?>
	<?php get_template_part( 'template-component/component-site-navigation-vertical', 'archive' ); ?>
	<!-- SITE WRAPPER:START -->
	<div class="wsu-wrapper-site">
		<!-- SITE CONTAINER:START -->
		<?php get_template_part( 'template-component/component-site-header', 'archive' ); ?>
		<div class="wsu-wrapper-content">
			<main role="main" id="wsu-content" class="wsu-wrapper-main" tabindex="-1">
				<?php get_template_part( 'template-parts/template-header', 'archive', array( 'context' => 'archive' ) ); ?>

				<?php get_template_part( 'template-parts/template-content', 'archive', array( 'context' => 'archive' ) ); ?>

				<?php get_template_part( 'template-parts/template-footer', 'archive', array( 'context' => 'archive' ) ); ?>
			</main>
			<?php get_template_part( 'template-parts/template-sidebar', 'archive', array( 'context' => 'archive' ) ); ?>
		</div>
		<?php get_template_part( 'template-component/component-site-footer', 'archive' ); ?>
		<!-- SITE CONTAINER:END -->
	</div>
	<!-- SITE WRAPPER:END -->
    <?php get_template_part( 'template-component/component-global-footer', 'archive' ); ?>
</div>
<!-- GLOBAL CONTAINER:END -->
<?php get_footer(); ?>