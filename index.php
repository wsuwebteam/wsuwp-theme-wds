<?php namespace WSUWP\Theme\WDS; ?>
<?php get_header(); ?>
<?php get_template_part( 'template-component/component-global-header', 'index' ); ?>
<?php get_template_part( 'template-component/component-site-navigation-vertical', 'index' ); ?>
<!-- SITE WRAPPER:START -->
<div class="wsu-wrapper-site">
	<!-- SITE CONTAINER:START -->
	<?php get_template_part( 'template-component/component-site-header', 'archive' ); ?>
	<div class="wsu-wrapper-content">
		<?php do_action('wsu_wds_theme_before_main', 'index'); ?>
		<main role="main" id="wsu-content" class="wsu-wrapper-main" tabindex="-1">
			<?php do_action('wsu_wds_theme_main', 'index'); ?>
			<?php get_template_part( 'template-component/component-breadcrumb', 'index' ); ?>
			<?php do_action('wsu_wds_theme_after_breadcrumbs', 'index'); ?>
			<?php if ( have_posts() ) : ?>
				<?php while ( have_posts() ) : the_post(); ?>
				<article class="wsu-article">
					<header class="wsu-article-header">
						<h1  class="wsu-article-header__title"><?php the_title(); ?></h1>
						<?php get_template_part( 'template-component/component-post-social-share', 'index' ); ?>
					</header>
					<?php do_action('wsu_wds_theme_after_header', 'index'); ?>
					<?php the_content(); ?>
					<footer class="wsu-article-footer">
						<?php get_template_part( 'template-component/component-post-social-share', 'index' ); ?>
						<?php get_template_part( 'template-component/component-post-published-by', 'index' ); ?>
						<?php get_template_part( 'template-component/component-post-categories', 'index' ); ?>
						<?php get_template_part( 'template-component/component-post-tags', 'index' ); ?>
					</footer>
				</article>
				<?php endwhile; ?>
			<?php endif; ?>
			<?php do_action('wsu_wds_theme_after_content', 'index'); ?>
		</main>
		<?php do_action('wsu_wds_theme_after_main', 'index'); ?>
	</div>
	<?php do_action('wsu_wds_theme_before_footer', 'index'); ?>
	<?php get_template_part( 'template-component/component-site-footer', 'archive' ); ?>
	<!-- SITE CONTAINER:END -->
</div>
<!-- SITE WRAPPER:END -->
<?php get_template_part( 'template-component/component-global-footer', 'index' ); ?>
<?php get_footer(); ?>