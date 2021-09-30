<div class="wsu-hero  wsu-pattern--wsu-light-radial-left">
    <div class="wsu-image-frame wsu-image-frame--fill">
        <?php get_template_part( 'template-component/component-post-image' ); ?>
    </div>
    <div class="wsu-overlay wsu-overlay--dark-left wsu-pattern-after">
    </div>
    <div class="wsu-hero__content">
        <div class="wsu-hero__caption">
            <div class="wsu-title"><?php the_title(); ?></div>
            <div class="wsu-caption">
                <?php the_excerpt(); ?>
            </div>
        </div>
    </div>
</div>