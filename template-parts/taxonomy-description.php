<?php namespace WSUWP\Theme\WDS;

$term_description = term_description();

?>
<?php if ( ! empty( $term_description ) && ! is_paged() ) : ?>
<div class="wsu-template__term-description">
    <?php echo wp_kses_post( $term_description ); ?>
</div>
<?php endif; ?>
