<?php if ( WSUWP\Theme\WDS\Template::get_option( 'show_footer', get_post_type(), 'single' ) ) : ?>
<footer class="wsu-article-footer">
    <?php if ( WSUWP\Theme\WDS\Template::get_option( 'show_share', get_post_type(), 'single' ) ) : ?><?php get_template_part( 'template-component/component-post-social-share', get_post_type() ); ?><?php endif; ?>
    <?php if ( WSUWP\Theme\WDS\Template::get_option( 'show_byline', get_post_type(), 'single' ) ) : ?><?php get_template_part( 'template-component/component-post-published-by', get_post_type() ); ?><?php endif; ?>
    <?php if ( WSUWP\Theme\WDS\Template::get_option( 'show_categories', get_post_type(), 'single' ) ) : ?><?php get_template_part( 'template-component/component-post-categories', get_post_type() ); ?><?php endif; ?>
    <?php if ( WSUWP\Theme\WDS\Template::get_option( 'show_tags', get_post_type(), 'single' ) ) : ?><?php get_template_part( 'template-component/component-post-tags', get_post_type() ); ?><?php endif; ?>
</footer>
<?php endif; ?>