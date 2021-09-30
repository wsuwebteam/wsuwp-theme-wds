<?php if ( apply_filters( 'wsu_wds_template_option', true, 'show_title', 'single' ) ) : ?>
<header class="wsu-article-header">
    <h1  class="wsu-article-header__title"><?php the_title(); ?></h1>
    <?php if ( apply_filters( 'wsu_wds_template_option', true, 'show_publish_date', 'single' ) ) : ?><?php get_template_part( 'template-component/component-post-published-date', get_post_type() ); ?><?php endif; ?>
    <?php if ( apply_filters( 'wsu_wds_template_option', true, 'show_share', 'single' ) ) : ?><?php get_template_part( 'template-component/component-post-social-share', get_post_type() ); ?><?php endif; ?>
</header>
<?php endif; ?>