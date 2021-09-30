<?php if ( apply_filters( 'wsu_wds_template_option', true, 'show_footer', 'home' ) ) : ?>
<footer class="wsu-article-footer">
    <?php if ( apply_filters( 'wsu_wds_template_option', true, 'show_share', 'home' ) ) : ?><?php get_template_part( 'template-component/component-post-social-share', get_post_type() ); ?><?php endif; ?>
    <?php if ( apply_filters( 'wsu_wds_template_option', true, 'show_byline', 'home' ) ) : ?><?php get_template_part( 'template-component/component-post-published-by', get_post_type() ); ?><?php endif; ?>
    <?php if ( apply_filters( 'wsu_wds_template_option', true, 'show_categories', 'home' ) ) : ?><?php get_template_part( 'template-component/component-post-categories', get_post_type() ); ?><?php endif; ?>
    <?php if ( apply_filters( 'wsu_wds_template_option', true, 'show_tags', 'home' ) ) : ?><?php get_template_part( 'template-component/component-post-tags', get_post_type() ); ?><?php endif; ?>
</footer>
<?php endif; ?>