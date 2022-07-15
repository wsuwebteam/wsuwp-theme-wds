<?php namespace WSUWP\Theme\WDS; ?>
<?php get_header(); ?>
<?php get_template_part( 'template-component/component-global-header', 'home' ); ?>
<?php get_template_part( 'template-component/component-site-navigation-vertical', 'home' ); ?>
<!-- SITE WRAPPER:START -->
<div class="wsu-wrapper-site">
	<!-- SITE CONTAINER:START -->
	<?php get_template_part( 'template-component/component-site-header', 'archive' ); ?>
	<div class="wsu-wrapper-content <?php echo esc_attr( WDS_Options::get_option_class( 'template', 'width', 'wsu-wrapper-content--' ) ); ?> <?php if ( Template::has_sidebar( 'post-archive' ) ) : ?>wsu-wrapper-content--layout-sidebar-right<?php endif; ?>">
		<?php do_action('wsu_wds_theme_before_main', 'home'); ?>
		<main role="main" id="wsu-content" class="wsu-wrapper-main" tabindex="-1">
			<?php do_action('wsu_wds_theme_main', 'home'); ?>
			<?php Template::get_template_part( 'template-component/component-breadcrumb', 'post-archive' ); ?>
			<?php do_action('wsu_wds_theme_after_breadcrumbs', 'home'); ?>
			<header class="wsu-article-header">
				<h1  class="wsu-article-header__title"><?php single_post_title(); ?></h1>
			</header>
			<?php do_action('wsu_wds_theme_after_header', 'home'); ?>
			<?php if ( have_posts() ) : ?>
				<?php while ( have_posts() ) : the_post(); ?>
					<?php Template::get_template_part( 'template-parts/article', 'index', 'post-archive' ) ?>
				<?php endwhile; ?>
				<?php Template::get_template_part( 'template-component/component-pagination', 'post-archive' ); ?>
			<?php endif; ?>
			<?php do_action('wsu_wds_theme_after_content', 'post-archive' ); ?>
		</main>
		<?php Template::get_template_part( 'template-parts/sidebar', 'post-archive' ); ?>
		<?php do_action('wsu_wds_theme_after_main', 'home'); ?>
	</div>
	<?php do_action('wsu_wds_theme_before_footer', 'home'); ?>
	<?php get_template_part( 'template-component/component-site-footer', 'home' ); ?>
	<!-- SITE CONTAINER:END -->
</div>
<!-- SITE WRAPPER:END -->
<?php get_template_part( 'template-component/component-global-footer', 'home' ); ?>
<?php get_footer(); ?>