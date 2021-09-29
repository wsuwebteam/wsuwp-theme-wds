<article class="<?php echo esc_attr( $wrapper_classes ); ?>">
	<?php do_action( 'wsu_wds_template_article_before' ); ?>
	<?php echo $content; ?>
	<?php do_action( 'wsu_wds_template_article_after' ); ?>
</article>