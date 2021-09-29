<main class="wsu-wrapper-content<?php if ( WSUWP\Theme\WDS\Sidebars::has() ) : ?> wsu-wrapper-content--has-sidebar<?php endif; ?>">
    <div class="wsu-page-content">
        <?php get_template_part( 'template-parts/template-home-header', get_post_type() ); ?>

        <?php get_template_part( 'template-parts/template-home-content', get_post_type() ); ?>

        <?php get_template_part( 'template-parts/template-home-footer', get_post_type() ); ?>
    </div>
	<?php get_template_part( 'template-parts/template-sidebar', get_post_type() ); ?>
</main>