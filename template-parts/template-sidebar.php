<?php if ( WSUWP\Theme\WDS\Sidebars::has() ) : ?>
<aside class="wsu-page-sidebar">
    <?php dynamic_sidebar( WSUWP\Theme\WDS\Sidebars::get_sidebar_id() ); ?>
</aside>
<?php endif; ?>