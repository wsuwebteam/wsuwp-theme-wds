<?php
$unlink = ( ! empty( $args['unlink'] ) ) ? $args['unlink'] : false;
?>
<?php if ( has_post_thumbnail() ) : ?>
<div class="wsu-image-frame">
	<?php if ( ! $unlink ) : ?><a href="<?php the_permalink(); ?>"><?php endif; ?>
	<?php get_template_part( 'template-component/component-post-image'); ?>
	<?php if ( ! $unlink ) : ?></a><?php endif; ?>
</div>
<?php endif; ?>