<?php $context = ( ! empty( $args['context'] ) ) ? $args['context'] : 'single'; ?>

<?php if ( apply_filters( 'wsu_wds_template_option', true, 'show_footer', 'single' ) ) : ?>
<footer class="wsu-article-footer">
    <?php if ( apply_filters( 'wsu_wds_template_option', true, 'show_share', $context ) ) : ?><?php get_template_part( 'template-component/component-post-social-share', $context ); ?><?php endif; ?>
    <?php if ( apply_filters( 'wsu_wds_template_option', true, 'show_byline', $context ) ) : ?><?php get_template_part( 'template-component/component-post-published-by', $context ); ?><?php endif; ?>
    <?php if ( apply_filters( 'wsu_wds_template_option', true, 'show_categories', $context ) ) : ?><?php get_template_part( 'template-component/component-post-categories', $context ); ?><?php endif; ?>
    <?php if ( apply_filters( 'wsu_wds_template_option', true, 'show_tags', $context ) ) : ?><?php get_template_part( 'template-component/component-post-tags', $context ); ?><?php endif; ?>
</footer>
<?php endif; ?>