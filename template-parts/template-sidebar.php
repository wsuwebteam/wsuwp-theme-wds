<?php
$sidebar = WSUWP\Theme\WDS\Template::get_sidebar();

?>
<?php if ( ! empty( $sidebar ) && 'none' !== $sidebar ) : ?>
<aside class="wsu-wrapper-sidebar">
    <?php dynamic_sidebar( $sidebar ); ?>
</aside>
<?php endif; ?>