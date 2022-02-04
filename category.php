<?php namespace WSUWP\Theme\WDS; 
?>
<?php get_header(); ?>
<?php get_template_part( 'template-component/component-global-header', 'category' ); ?>
<?php get_template_part( 'template-component/component-site-navigation-vertical', 'category' ); ?>
<!-- SITE WRAPPER:START -->
<div class="wsu-wrapper-site">
	<!-- SITE CONTAINER:START -->
	<?php get_template_part( 'template-component/component-site-header', 'category' ); ?>
	<div class="wsu-wrapper-content">
		<?php do_action('wsu_wds_theme_before_main', 'category'); ?>
		<main role="main" id="wsu-content" class="wsu-wrapper-main" tabindex="-1">
		<?php do_action('wsu_wds_theme_main', 'category'); ?>
		<?php if ( get_theme_mod( 'wsu_wds_template_category_show_breadcrumbs', true ) ) : ?><?php get_template_part( 'template-component/component-breadcrumb', 'category' ); ?><?php endif; ?>
			<?php do_action('wsu_wds_theme_after_breadcrumbs', 'category'); ?>
			<?php if ( get_theme_mod( 'wsu_wds_template_category_show_title', true ) ) : ?>
				<header class="wsu-page-header">
					<h1  class="wsu-page-header__title"><?php single_term_title(); ?></h1>
				</header>
			<?php endif; ?>
			<?php do_action('wsu_wds_theme_after_header', 'category'); ?>
			<?php if ( have_posts() ) : ?>
				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'template-component/component-post-index-card', 'reversed' ); ?>
				<?php endwhile; ?>
				<?php get_template_part( 'template-component/component-pagination', 'category' ); ?>
			<?php endif; ?>
			<?php do_action('wsu_wds_theme_after_content', 'category'); ?>
		</main>
		<?php do_action('wsu_wds_theme_after_main', 'category'); ?>
		<?php if ( Template::get_sidebar( 'wsu_wds_template_category_show_sidebar', 'sidebar_post' ) ) : ?>
			<aside class="wsu-wrapper-sidebar">
				<?php dynamic_sidebar( Template::get_sidebar( 'wsu_wds_template_category_show_sidebar', 'sidebar_post' ) ); ?>
			</aside>
		<?php endif; ?>
	</div>
	<?php do_action('wsu_wds_theme_before_footer', 'category'); ?>
	<?php get_template_part( 'template-component/component-site-footer', 'category' ); ?>
	<!-- SITE CONTAINER:END -->
</div>
<!-- SITE WRAPPER:END -->
<?php get_template_part( 'template-component/component-global-footer', 'category' ); ?>
<?php get_footer(); ?>