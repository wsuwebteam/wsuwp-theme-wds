<?php namespace WSUWP\Theme\WDS; 
?>
<?php get_header(); ?>
<?php get_template_part( 'template-component/component-global-header', 'tag' ); ?>
<?php Theme_Blocks::render( 'header_global' ); ?>
<?php Theme_Blocks::render_option( 'site_header' ); ?>
<?php Theme_Blocks::render( 'navigation_mobile' ); ?>
<?php Theme_Blocks::render( 'navigation_vertical' ); ?>
<?php Theme_Blocks::render( 'header_quicklinks' ); ?>
<?php get_template_part( 'template-component/component-site-navigation-vertical', 'tag' ); ?>
<!-- SITE WRAPPER:START -->
<div class="wsu-wrapper-site">
	<!-- SITE CONTAINER:START -->
	<?php get_template_part( 'template-component/component-site-header', 'tag' ); ?>
	<?php Theme_Blocks::render( 'navigation_audience' ); ?>
	<div class="wsu-wrapper-content <?php echo esc_attr( WDS_Options::get_option_class( 'template', 'width', 'wsu-wrapper-content--' ) ); ?> <?php if ( Template::get_sidebar( 'wsu_wds_template_tag_show_sidebar', 'sidebar_post' ) ) : ?>wsu-wrapper-content--layout-sidebar-right<?php endif; ?>">
		<?php do_action('wsu_wds_theme_before_main', 'tag'); ?>
		<main role="main" id="wsu-content" class="wsu-wrapper-main" tabindex="-1">
		<?php do_action('wsu_wds_theme_main', 'tag'); ?>
		<?php if ( get_theme_mod( 'wsu_wds_template_tag_show_breadcrumbs', true ) ) : ?><?php get_template_part( 'template-component/component-breadcrumb', 'tag' ); ?><?php endif; ?>
			<?php do_action('wsu_wds_theme_after_breadcrumbs', 'tag'); ?>
			<?php if ( get_theme_mod( 'wsu_wds_template_tag_show_title', true ) ) : ?>
				<header class="wsu-page-header">
					<h1  class="wsu-page-header__title"><?php single_term_title(); ?></h1>
				</header>
			<?php endif; ?>
			<?php Template::get_template_part( 'template-parts/taxonomy-description', 'tag' ); ?>
			<?php do_action('wsu_wds_theme_after_header', 'tag'); ?>
			<?php if ( have_posts() ) : ?>
				<?php while ( have_posts() ) : the_post(); ?>
					<?php Template::get_template_part( 'template-parts/article', 'index', 'tag' ) ?>
				<?php endwhile; ?>
				<?php get_template_part( 'template-component/component-pagination', 'tag' ); ?>
			<?php endif; ?>
			<?php do_action('wsu_wds_theme_after_content', 'tag'); ?>
		</main>
		<?php do_action('wsu_wds_theme_after_main', 'tag'); ?>
		<?php if ( Template::get_sidebar( 'wsu_wds_template_tag_show_sidebar', 'sidebar_post' ) ) : ?>
			<aside class="wsu-wrapper-sidebar">
				<?php dynamic_sidebar( Template::get_sidebar( 'wsu_wds_template_tag_show_sidebar', 'sidebar_post' ) ); ?>
			</aside>
		<?php endif; ?>
	</div>
	<?php do_action('wsu_wds_theme_before_footer', 'tag'); ?>
	<?php get_template_part( 'template-component/component-site-footer', 'tag' ); ?>
	<!-- SITE CONTAINER:END -->
</div>
<!-- SITE WRAPPER:END -->
<?php get_template_part( 'template-component/component-global-footer', 'tag' ); ?>
<?php get_footer(); ?>
