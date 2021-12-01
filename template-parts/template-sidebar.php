<?php

$context = ( ! empty( $args['context'] ) ) ? $args['context'] : 'single';

$sidebar = WSUWP\Theme\WDS\Template::get_sidebar( $context );

?>
<?php if ( ! empty( $sidebar ) && 'none' !== $sidebar ) : ?>
<aside class="wsu-wrapper-sidebar">
    <?php dynamic_sidebar( $sidebar ); ?>
</aside>
<?php endif; ?>