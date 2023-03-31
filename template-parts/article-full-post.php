<?php namespace WSUWP\Theme\WDS;

$context = ( ! empty( $args['context'] ) ) ? $args['context'] : 'page';

?>
<article class="wsu-article">
	<?php if ( get_theme_mod( 'wsu_wds_template_post_show_title', true ) && apply_filters( 'wsu_wds_template_show_title', true ) ) : ?>
		<header class="wsu-article-header">
			<h2  class="wsu-article-header__title"><?php the_title(); ?></h2>
			<?php if ( get_theme_mod( 'wsu_wds_template_post_show_publish_date', true ) ) : ?><?php get_template_part( 'template-component/component-post-published-date', 'post-archive' ); ?><?php endif; ?>
			<?php if ( get_theme_mod( 'wsu_wds_template_post_show_share', true ) ) : ?><?php get_template_part( 'template-component/component-post-social-share', 'post-archive' ); ?><?php endif; ?>
		</header>
	<?php endif; ?>
	<?php do_action('wsu_wds_theme_after_header', 'post-archive'); ?>
	<?php if ( get_theme_mod( 'wsu_wds_template_post_show_featured_image', true ) && has_post_thumbnail() ) : ?>
		<?php get_template_part( 'template-component/component-hero-figure', 'post-archive' ); ?>
	<?php endif; ?>
	<?php the_content(); ?>
	<footer class="wsu-article-footer">
		<?php if ( get_theme_mod( 'wsu_wds_template_post_show_byline', false ) ) : ?><?php get_template_part( 'template-component/component-post-published-by', 'post-archive' ); ?><?php endif; ?>
		<?php if ( get_theme_mod( 'wsu_wds_template_post_show_categories', true ) ) : ?><?php get_template_part( 'template-component/component-post-categories', 'post-archive' ); ?><?php endif; ?>
		<?php if ( get_theme_mod( 'wsu_wds_template_post_show_tags', true ) ) : ?><?php get_template_part( 'template-component/component-post-tags', 'post-archive' ); ?><?php endif; ?>
	</footer>
</article>