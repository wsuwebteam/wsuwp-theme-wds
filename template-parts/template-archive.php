<div class="wsu-wrapper-content">
	<main role="main" id="wsu-content" class="wsu-wrapper-main" tabindex="-1">
        <?php get_template_part( 'template-parts/template-archive-header', get_post_type() ); ?>

        <?php get_template_part( 'template-parts/template-archive-content', get_post_type() ); ?>

        <?php get_template_part( 'template-parts/template-archive-footer', get_post_type() ); ?>
    </main>
	<?php get_template_part( 'template-parts/template-sidebar', get_post_type() ); ?>
</div>