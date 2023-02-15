<header class="wsu-header-global  wsu-header-global--style-system">
	<ul class="wsu-header-global__menu">
		<li>
			<a href="https://wsu.edu">Washington State University</a>
		</li>
		<?php if ( ! empty( $args['parent_name'] ) && ! empty( $args['parent_url'] ) ) : ?><li>
			<a href="<?php echo esc_url( $args['parent_url'] ); ?>"><?php echo wp_kses_post( $args['parent_name'] ); ?></a>
		</li><?php endif; ?>
	</ul>
</header>
