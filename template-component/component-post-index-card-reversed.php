<?php
$title_tag = ( empty( $args['tag'] ) ) ? 'h2' : $args['tag'];
?>
<article class="wsu-article wsu-card wsu-card--horizontal">
    <div class="wsu-card__content">
        <<?php echo esc_attr( $title_tag); ?> class="wsu-title wsu-title--large">
            <a href="<?php the_permalink(); ?>">
                <?php the_title(); ?>
            </a>
        </<?php echo esc_attr( $title_tag); ?>>
        <?php get_template_part( 'template-component/component-post-published-date', get_post_type() ); ?>
        <?php get_template_part( 'template-component/component-post-caption', get_post_type() ); ?>
        <?php get_template_part( 'template-component/component-post-published-by', get_post_type() ); ?>
        <?php get_template_part( 'template-component/component-post-categories', get_post_type() ); ?>
        <?php get_template_part( 'template-component/component-post-tags', get_post_type() ); ?>
    </div>
    <?php get_template_part( 'template-component/component-post-image-frame', get_post_type() ); ?>
</article>