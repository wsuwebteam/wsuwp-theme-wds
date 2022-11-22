<div id="wsu-quicklinks-panel" class="wsu-slide-in-panel wsu-slide-in-panel--width-large wsu-slide-in-panel--style-crimson-mark" aria-expanded="false" aria-haspopup="true" aria-label="Quick links Menu">
    <button class="wsu-slide-in-panel__overlay wsu-slide-in-panel--close">Close Quick links Menu</button>
    <div class="wsu-slide-in-panel__panel wsu-background--gradient-dark">
        <div class="wsu-slide-in-panel__panel-inner">
        <?php if ( is_active_sidebar( 'wsu_wds_quicklinks' ) ) : ?>
            <div class="wsu-widget-area">
                <?php dynamic_sidebar( 'wsu_wds_quicklinks' ); ?>
            </div>
        <?php endif; ?>
        </div>
    </div>
</div>