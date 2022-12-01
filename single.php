<?php namespace WSUWP\Theme\WDS; 
?>
<?php get_header(); ?>
<?php get_template_part( 'template-component/component-global-header', 'single' ); ?>
<?php Theme_Blocks::render_option( 'site_header' ); ?>
<?php get_template_part( 'template-component/component-site-navigation-vertical', 'single' ); ?>
<!-- SITE WRAPPER:START -->
<div class="wsu-wrapper-site">
	<!-- SITE CONTAINER:START -->
	<?php get_template_part( 'template-component/component-site-header', 'single' ); ?>
	<div class="wsu-wrapper-content <?php echo esc_attr( WDS_Options::get_option_class( 'template', 'width', 'wsu-wrapper-content--' ) ); ?>">
		<?php do_action('wsu_wds_theme_before_main', 'single'); ?>
		<main role="main" id="wsu-content" class="wsu-wrapper-main" tabindex="-1">
			<?php do_action('wsu_wds_theme_main', 'single'); ?>
			<?php if ( have_posts() ) : ?>
				<?php while ( have_posts() ) : the_post(); ?>
				<?php if ( get_theme_mod( 'wsu_wds_template_single_show_breadcrumbs', $show_breadcrumbs ) && apply_filters( 'wsu_wds_template_show_title', true ) ) : ?>
					<?php get_template_part( 'template-component/component-breadcrumb', 'single' ); ?>
				<?php endif; ?>
				<?php do_action('wsu_wds_theme_after_breadcrumbs', 'single'); ?>
				<article class="wsu-article">
					<?php if ( get_theme_mod( 'wsu_wds_template_single_show_title', true ) && apply_filters( 'wsu_wds_template_show_title', true ) ) : ?>
						<header class="wsu-article-header">
							<h1  class="wsu-article-header__title"><?php the_title(); ?></h1>
							<?php if ( get_theme_mod( 'wsu_wds_template_single_show_publish_date', false ) ) : ?><?php get_template_part( 'template-component/component-post-published-date', 'single' ); ?><?php endif; ?>
							<?php if ( get_theme_mod( 'wsu_wds_template_single_show_share', false ) ) : ?><?php get_template_part( 'template-component/component-post-social-share', 'single' ); ?><?php endif; ?>
						</header>
					<?php endif; ?>
					<?php do_action('wsu_wds_theme_after_header', 'single'); ?>
					<?php the_content(); ?>
					<footer class="wsu-article-footer">
						<?php if ( get_theme_mod( 'wsu_wds_template_single_show_share', false ) ) : ?><?php get_template_part( 'template-component/component-post-social-share', 'single' ); ?><?php endif; ?>
						<?php if ( get_theme_mod( 'wsu_wds_template_single_show_byline', false ) ) : ?><?php get_template_part( 'template-component/component-post-published-by', 'single' ); ?><?php endif; ?>
						<?php if ( get_theme_mod( 'wsu_wds_template_single_show_categories', false ) ) : ?><?php get_template_part( 'template-component/component-post-categories', 'single' ); ?><?php endif; ?>
						<?php if ( get_theme_mod( 'wsu_wds_template_single_show_tags', false ) ) : ?><?php get_template_part( 'template-component/component-post-tags', 'single' ); ?><?php endif; ?>
					</footer>
				</article>
				<?php endwhile; ?>
			<?php endif; ?>
			<?php do_action('wsu_wds_theme_after_content', 'single'); ?>
		</main>
		<?php do_action('wsu_wds_theme_after_main', 'single'); ?>
	</div>
	<?php do_action('wsu_wds_theme_before_footer', 'single'); ?>
	<?php get_template_part( 'template-component/component-site-footer', 'single' ); ?>
	<!-- SITE CONTAINER:END -->
</div>
<!-- SITE WRAPPER:END -->
<?php get_template_part( 'template-component/component-global-footer', 'single' ); ?>
<?php get_footer(); ?>