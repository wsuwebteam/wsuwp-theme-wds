<?php namespace WSUWP\Theme\WDS; ?>
<?php get_header(); ?>
<!-- GLOBAL CONTAINER:START -->
<div class="wsu-wrapper-global">
	<?php get_template_part( 'template-component/component-global-header', 'index' ); ?>
	<?php get_template_part( 'template-component/component-site-navigation-vertical', 'index' ); ?>
	<!-- SITE WRAPPER:START -->
	<div class="wsu-wrapper-site">
		<!-- SITE CONTAINER:START -->
		<?php get_template_part( 'template-component/component-site-header', 'archive' ); ?>
		<div class="wsu-wrapper-content">
			<main role="main" id="wsu-content" class="wsu-wrapper-main" tabindex="-1">
				<?php get_template_part( 'template-parts/template-header', 'archive', array( 'context' => 'index' ) ); ?>

				<?php get_template_part( 'template-parts/template-content', 'archive', array( 'context' => 'index' ) ); ?>

				<?php get_template_part( 'template-parts/template-footer', 'archive', array( 'context' => 'index' ) ); ?>
			</main>
			<?php get_template_part( 'template-parts/template-sidebar', 'archive', array( 'context' => 'index' ) ); ?>
		</div>
		<?php get_template_part( 'template-component/component-site-footer', 'archive' ); ?>
		<!-- SITE CONTAINER:END -->
	</div>
	<!-- SITE WRAPPER:END -->
    <?php get_template_part( 'template-component/component-global-footer', 'index' ); ?>
</div>
<!-- GLOBAL CONTAINER:END -->
<?php get_footer(); ?>