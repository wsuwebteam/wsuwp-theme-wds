<?php if ( apply_filters( 'wsu_wds_template_option', true, 'show_footer', 'single' ) ) : ?>
<footer class="wsu-article-footer">
    <?php if ( apply_filters( 'wsu_wds_template_option', true, 'show_share', 'single' ) ) : ?><?php get_template_part( 'template-component/component-post-social-share', get_post_type() ); ?><?php endif; ?>
    <?php if ( apply_filters( 'wsu_wds_template_option', true, 'show_byline', 'single' ) ) : ?><?php get_template_part( 'template-component/component-post-published-by', get_post_type() ); ?><?php endif; ?>
    <?php if ( apply_filters( 'wsu_wds_template_option', true, 'show_categories', 'single' ) ) : ?><?php get_template_part( 'template-component/component-post-categories', get_post_type() ); ?><?php endif; ?>
    <?php if ( apply_filters( 'wsu_wds_template_option', true, 'show_tags', 'single' ) ) : ?><?php get_template_part( 'template-component/component-post-tags', get_post_type() ); ?><?php endif; ?>
</footer>
<?php endif; ?>