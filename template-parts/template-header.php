<?php $context = ( ! empty( $args['context'] ) ) ? $args['context'] : 'single'; ?>

<?php if ( apply_filters( 'wsu_wds_template_option', true, 'show_title', $context ) ) : ?>
<header class="wsu-article-header">
    <h1  class="wsu-article-header__title"><?php the_title(); ?></h1>
    <?php if ( apply_filters( 'wsu_wds_template_option', true, 'show_publish_date', $context ) ) : ?><?php get_template_part( 'template-component/component-post-published-date', $context ); ?><?php endif; ?>
    <?php if ( apply_filters( 'wsu_wds_template_option', true, 'show_share', $context ) ) : ?><?php get_template_part( 'template-component/component-post-social-share', $context ); ?><?php endif; ?>
</header>
<?php endif; ?>