<?php namespace WSUWP\Theme\WDS; 

/* The page template is used both for the front-page (home) template
* and and individual page. Therefore we need to check our context
*/
$context = ( is_front_page() ) ? 'home' : 'page';
$show_breadcrumbs = ( 'home' === $context ) ? false : true;
?>
<?php get_header(); ?>
<?php get_template_part( 'template-component/component-global-header', $context ); ?>
<?php get_template_part( 'template-component/component-site-navigation-vertical', $context ); ?>
<!-- SITE WRAPPER:START -->
<div class="wsu-wrapper-site">
	<!-- SITE CONTAINER:START -->
	<?php get_template_part( 'template-component/component-site-header', $context ); ?>
	<div class="wsu-wrapper-content">
		<?php do_action('wsu_wds_theme_before_main', $context); ?>
		<main role="main" id="wsu-content" class="wsu-wrapper-main" tabindex="-1">
			<?php do_action('wsu_wds_theme_main', $context); ?>
			<?php if ( have_posts() ) : ?>
				<?php while ( have_posts() ) : the_post(); ?>
				<?php if ( get_theme_mod( 'wsu_wds_template_' . $context . '_show_breadcrumbs', $show_breadcrumbs ) && apply_filters( 'wsu_wds_template_show_title', true ) ) : ?>
					<?php get_template_part( 'template-component/component-breadcrumb', $context ); ?>
				<?php endif; ?>
				<?php do_action('wsu_wds_theme_after_breadcrumbs', $context); ?>
				<article class="wsu-article">
					<?php if ( get_theme_mod( 'wsu_wds_template_' . $context . '_show_title', true ) && apply_filters( 'wsu_wds_template_show_title', true ) ) : ?>
						<header class="wsu-article-header">
							<h1  class="wsu-article-header__title"><?php the_title(); ?></h1>
							<?php if ( get_theme_mod( 'wsu_wds_template_' . $context . '_show_publish_date', false ) ) : ?><?php get_template_part( 'template-component/component-post-published-date', $context ); ?><?php endif; ?>
							<?php if ( get_theme_mod( 'wsu_wds_template_' . $context . '_show_share', false ) ) : ?><?php get_template_part( 'template-component/component-post-social-share', $context ); ?><?php endif; ?>
						</header>
					<?php endif; ?>
					<?php do_action('wsu_wds_theme_after_header', $context); ?>
					<?php the_content(); ?>
					<footer class="wsu-article-footer">
						<?php if ( get_theme_mod( 'wsu_wds_template_' . $context . '_show_share', false ) ) : ?><?php get_template_part( 'template-component/component-post-social-share', $context ); ?><?php endif; ?>
						<?php if ( get_theme_mod( 'wsu_wds_template_' . $context . '_show_byline', false ) ) : ?><?php get_template_part( 'template-component/component-post-published-by', $context ); ?><?php endif; ?>
						<?php if ( get_theme_mod( 'wsu_wds_template_' . $context . '_show_categories', false ) ) : ?><?php get_template_part( 'template-component/component-post-categories', $context ); ?><?php endif; ?>
						<?php if ( get_theme_mod( 'wsu_wds_template_' . $context . '_show_tags', false ) ) : ?><?php get_template_part( 'template-component/component-post-tags', $context ); ?><?php endif; ?>
					</footer>
				</article>
				<?php endwhile; ?>
			<?php endif; ?>
			<?php do_action('wsu_wds_theme_after_content', $context); ?>
		</main>
		<?php do_action('wsu_wds_theme_after_main', $context); ?>
	</div>
	<?php do_action('wsu_wds_theme_before_footer', $context); ?>
	<?php get_template_part( 'template-component/component-site-footer', $context ); ?>
	<!-- SITE CONTAINER:END -->
</div>
<!-- SITE WRAPPER:END -->
<?php get_template_part( 'template-component/component-global-footer', $context ); ?>
<?php get_footer(); ?>