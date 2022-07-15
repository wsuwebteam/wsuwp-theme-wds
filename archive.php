<?php namespace WSUWP\Theme\WDS; 
?>
<?php get_header(); ?>
<?php get_template_part( 'template-component/component-global-header', 'archive' ); ?>
<?php get_template_part( 'template-component/component-site-navigation-vertical', 'archive' ); ?>
<!-- SITE WRAPPER:START -->
<div class="wsu-wrapper-site">
	<!-- SITE CONTAINER:START -->
	<?php get_template_part( 'template-component/component-site-header', 'archive' ); ?>
	<div class="wsu-wrapper-content <?php echo esc_attr( WDS_Options::get_option_class( 'template', 'width', 'wsu-wrapper-content--' ) ); ?> <?php if ( Template::get_sidebar( 'wsu_wds_template_archive_show_sidebar', 'sidebar_post' ) ) : ?>wsu-wrapper-content--layout-sidebar-right<?php endif; ?>">
		<?php do_action('wsu_wds_theme_before_main', 'archive'); ?>
		<main role="main" id="wsu-content" class="wsu-wrapper-main" tabindex="-1">
		<?php do_action('wsu_wds_theme_main', 'archive'); ?>
		<?php if ( get_theme_mod( 'wsu_wds_template_archive_show_breadcrumbs', true ) ) : ?><?php get_template_part( 'template-component/component-breadcrumb', 'archive' ); ?><?php endif; ?>
			<?php do_action('wsu_wds_theme_after_breadcrumbs', 'archive'); ?>
			<?php if ( get_theme_mod( 'wsu_wds_template_archive_show_title', true ) ) : ?>
				<header class="wsu-page-header">
					<h1  class="wsu-page-header__title"><?php single_term_title(); ?></h1>
				</header>
			<?php endif; ?>
			<?php do_action('wsu_wds_theme_after_header', 'archive'); ?>
			<?php if ( have_posts() ) : ?>
				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'template-component/component-post-index-card', 'reversed', array( 'context' => 'archive' ) ); ?>
				<?php endwhile; ?>
				<?php get_template_part( 'template-component/component-pagination', 'archive' ); ?>
			<?php endif; ?>
			<?php do_action('wsu_wds_theme_after_content', 'archive'); ?>
		</main>
		<?php do_action('wsu_wds_theme_after_main', 'archive'); ?>
		<?php if ( Template::get_sidebar( 'wsu_wds_template_archive_show_sidebar', 'sidebar_post' ) ) : ?>
			<aside class="wsu-wrapper-sidebar">
				<?php dynamic_sidebar( Template::get_sidebar( 'wsu_wds_template_archive_show_sidebar', 'sidebar_post' ) ); ?>
			</aside>
		<?php endif; ?>
	</div>
	<?php do_action('wsu_wds_theme_before_footer', 'archive'); ?>
	<?php get_template_part( 'template-component/component-site-footer', 'archive' ); ?>
	<!-- SITE CONTAINER:END -->
</div>
<!-- SITE WRAPPER:END -->
<?php get_template_part( 'template-component/component-global-footer', 'archive' ); ?>
<?php get_footer(); ?>