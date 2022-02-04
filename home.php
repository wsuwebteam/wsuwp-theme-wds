<?php namespace WSUWP\Theme\WDS; ?>
<?php get_header(); ?>
<?php get_template_part( 'template-component/component-global-header', 'home' ); ?>
<?php get_template_part( 'template-component/component-site-navigation-vertical', 'home' ); ?>
<!-- SITE WRAPPER:START -->
<div class="wsu-wrapper-site">
	<!-- SITE CONTAINER:START -->
	<?php get_template_part( 'template-component/component-site-header', 'archive' ); ?>
	<div class="wsu-wrapper-content">
		<?php do_action('wsu_wds_theme_before_main', 'home'); ?>
		<main role="main" id="wsu-content" class="wsu-wrapper-main" tabindex="-1">
			<?php do_action('wsu_wds_theme_main', 'home'); ?>
			<?php if ( get_theme_mod( 'wsu_wds_template_home_breadcrumbs', true ) ) : ?><?php get_template_part( 'template-component/component-breadcrumb', 'home' ); ?><?php endif; ?>
			<?php do_action('wsu_wds_theme_after_breadcrumbs', 'home'); ?>
			<header class="wsu-article-header">
				<h1  class="wsu-article-header__title"><?php echo get_bloginfo( 'name' ); ?></h1>
			</header>
			<?php do_action('wsu_wds_theme_after_header', 'home'); ?>
			<?php if ( have_posts() ) : ?>
				<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'template-component/component-post-index-card', 'reversed' ); ?>
				<?php endwhile; ?>
			<?php endif; ?>
			<?php do_action('wsu_wds_theme_after_content', 'home'); ?>
		</main>
		<?php do_action('wsu_wds_theme_after_main', 'home'); ?>
	</div>
	<?php do_action('wsu_wds_theme_before_footer', 'home'); ?>
	<?php get_template_part( 'template-component/component-site-footer', 'home' ); ?>
	<!-- SITE CONTAINER:END -->
</div>
<!-- SITE WRAPPER:END -->
<?php get_template_part( 'template-component/component-global-footer', 'home' ); ?>
<?php get_footer(); ?>