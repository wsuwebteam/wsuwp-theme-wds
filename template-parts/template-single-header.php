<?php if ( WSUWP\Theme\WDS\Template::get_option( 'show_title', get_post_type(), 'single' ) ) : ?>
<header class="wsu-article-header">
    <h1  class="wsu-article-header__title"><?php the_title(); ?></h1>
    <?php if ( WSUWP\Theme\WDS\Template::get_option( 'show_publish_date', get_post_type(), 'single' ) ) : ?><?php get_template_part( 'template-component/component-post-published-date', get_post_type() ); ?><?php endif; ?>
    <?php if ( WSUWP\Theme\WDS\Template::get_option( 'show_share', get_post_type(), 'single' ) ) : ?><?php get_template_part( 'template-component/component-post-social-share', get_post_type() ); ?><?php endif; ?>
</header>
<?php endif; ?>