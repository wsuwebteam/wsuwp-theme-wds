<?php namespace WSUWP\Theme\WDS; ?>
<?php get_header(); ?>
<?php get_template_part( 'template-component/component-global-header', 'post' ); ?>
<?php Theme_Blocks::render( 'header_global' ); ?>
<?php Theme_Blocks::render_option( 'site_header' ); ?>
<?php Theme_Blocks::render( 'navigation_mobile' ); ?>
<?php Theme_Blocks::render( 'navigation_vertical' ); ?>
<?php Theme_Blocks::render( 'header_quicklinks' ); ?>
<?php get_template_part( 'template-component/component-site-navigation-vertical', 'post' ); ?>
<!-- SITE WRAPPER:START -->
<div class="wsu-wrapper-site">
	<!-- SITE CONTAINER:START -->
	<?php get_template_part( 'template-component/component-site-header', 'post' ); ?>
	<?php Theme_Blocks::render( 'navigation_audience' ); ?>
	<div class="wsu-wrapper-content <?php echo esc_attr( WDS_Options::get_option_class( 'template', 'width', 'wsu-wrapper-content--' ) ); ?> <?php if ( Template::get_sidebar( 'wsu_wds_template_post_show_sidebar', 'sidebar_post' ) ) : ?>wsu-wrapper-content--layout-sidebar-right<?php endif; ?>">
		<?php do_action('wsu_wds_theme_before_main', 'post'); ?>
		<main role="main" id="wsu-content" class="wsu-wrapper-main" tabindex="-1">
			<?php do_action('wsu_wds_theme_main', 'post'); ?>
			<?php if ( have_posts() ) : ?>
				<?php while ( have_posts() ) : the_post(); ?>
				<?php if ( get_theme_mod( 'wsu_wds_template_post_show_breadcrumbs', true ) ) : ?><?php get_template_part( 'template-component/component-breadcrumb', 'post' ); ?><?php endif; ?>
				<?php do_action('wsu_wds_theme_after_breadcrumbs', 'post'); ?>
				<article class="wsu-article">
					<?php if ( get_theme_mod( 'wsu_wds_template_post_show_title', true ) && apply_filters( 'wsu_wds_template_show_title', true ) ) : ?>
						<header class="wsu-article-header">
							<h1  class="wsu-article-header__title"><?php the_title(); ?></h1>
							<?php if ( get_theme_mod( 'wsu_wds_template_post_show_publish_date', true ) ) : ?><?php get_template_part( 'template-component/component-post-published-date', 'post' ); ?><?php endif; ?>
							<?php if ( get_theme_mod( 'wsu_wds_template_post_show_share', true ) ) : ?><?php get_template_part( 'template-component/component-post-social-share', 'post' ); ?><?php endif; ?>
						</header>
					<?php endif; ?>
					<?php do_action('wsu_wds_theme_after_header', 'post'); ?>
					<?php if ( get_theme_mod( 'wsu_wds_template_post_show_featured_image', true ) && has_post_thumbnail() ) : ?>
						<?php get_template_part( 'template-component/component-hero-figure', 'post' ); ?>
					<?php endif; ?>
					<?php the_content(); ?>
					<footer class="wsu-article-footer">
						<?php if ( get_theme_mod( 'wsu_wds_template_post_show_share', true ) ) : ?><?php get_template_part( 'template-component/component-post-social-share', 'post' ); ?><?php endif; ?>
						<?php if ( get_theme_mod( 'wsu_wds_template_post_show_byline', false ) ) : ?><?php get_template_part( 'template-component/component-post-published-by', 'post' ); ?><?php endif; ?>
						<?php if ( get_theme_mod( 'wsu_wds_template_post_show_categories', true ) ) : ?><?php get_template_part( 'template-component/component-post-categories', 'post' ); ?><?php endif; ?>
						<?php if ( get_theme_mod( 'wsu_wds_template_post_show_tags', true ) ) : ?><?php get_template_part( 'template-component/component-post-tags', 'post' ); ?><?php endif; ?>
					</footer>
				</article>
				<?php endwhile; ?>
			<?php endif; ?>
			<?php do_action('wsu_wds_theme_after_content', 'post'); ?>
		</main>
		<?php do_action('wsu_wds_theme_after_main', 'post'); ?>
		<?php if ( Template::get_sidebar( 'wsu_wds_template_post_show_sidebar', 'sidebar_post' ) ) : ?>
			<aside class="wsu-wrapper-sidebar">
				<?php dynamic_sidebar( Template::get_sidebar( 'wsu_wds_template_post_show_sidebar', 'sidebar_post' ) ); ?>
			</aside>
		<?php endif; ?>
	</div>
	<?php do_action('wsu_wds_theme_before_footer', 'post'); ?>
	<?php get_template_part( 'template-component/component-site-footer', 'post' ); ?>
	<!-- SITE CONTAINER:END -->
</div>
<!-- SITE WRAPPER:END -->
<?php get_template_part( 'template-component/component-global-footer', 'post' ); ?>
<?php get_footer(); ?>