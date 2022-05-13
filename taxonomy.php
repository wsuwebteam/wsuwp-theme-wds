<?php namespace WSUWP\Theme\WDS; ?>
<?php get_header(); ?>
<?php get_template_part( 'template-component/component-global-header', 'taxonomy' ); ?>
<?php get_template_part( 'template-component/component-site-navigation-vertical', 'taxonomy' ); ?>
<!-- SITE WRAPPER:START -->
<div class="wsu-wrapper-site">
	<!-- SITE CONTAINER:START -->
	<?php get_template_part( 'template-component/component-site-header', 'taxonomy' ); ?>
	<div class="wsu-wrapper-content <?php echo esc_attr( WDS_Options::get_option_class( 'template', 'width', 'wsu-wrapper-content--' ) ); ?>">
		<?php do_action('wsu_wds_theme_before_main', 'taxonomy'); ?>
		<main role="main" id="wsu-content" class="wsu-wrapper-main" tabindex="-1">
			<?php do_action('wsu_wds_theme_main', 'taxonomy'); ?>
			<?php Template::get_template_part( 'template-component/component-breadcrumb', 'taxonomy' ); ?>
			<?php do_action('wsu_wds_theme_after_breadcrumbs', 'taxonomy'); ?>
			<header class="wsu-article-header">
				<h1  class="wsu-article-header__title"><?php single_term_title(); ?></h1>
			</header>
			<?php do_action('wsu_wds_theme_after_header', 'taxonomy'); ?>
			<?php Template::get_template_part( 'template-parts/taxonomy-description', 'taxonomy' ); ?>
			<?php if ( have_posts() ) : ?>
				<?php while ( have_posts() ) : the_post(); ?>
					<?php Template::get_template_part( 'template-parts/article', 'index', 'taxonomy' ) ?>
				<?php endwhile; ?>
				<?php Template::get_template_part( 'template-component/component-pagination', 'taxonomy' ); ?>
			<?php endif; ?>
			<?php do_action('wsu_wds_theme_after_content', 'taxonomy' ); ?>
		</main>
		<?php Template::get_template_part( 'template-parts/sidebar', 'taxonomy' ); ?>
		<?php do_action('wsu_wds_theme_after_main', 'taxonomy'); ?>
	</div>
	<?php do_action('wsu_wds_theme_before_footer', 'taxonomy'); ?>
	<?php get_template_part( 'template-component/component-site-footer', 'taxonomy' ); ?>
	<!-- SITE CONTAINER:END -->
</div>
<!-- SITE WRAPPER:END -->
<?php get_template_part( 'template-component/component-global-footer', 'taxonomy' ); ?>
<?php get_footer(); ?>