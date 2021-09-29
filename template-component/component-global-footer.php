<?php if ( empty( get_theme_mod('wsu_wds_global_footer_hide', false ) ) ) : ?>
<footer class="wsu-footer-global<?php if ( ! empty( get_theme_mod('wsu_wds_global_footer_style', false ) ) ) : ?> wsu-footer-global--<?php echo esc_attr( get_theme_mod( 'wsu_wds_global_footer_style', '' ) ); ?><?php endif; ?>">
	<div class="wsu-footer-global__copyright">
		© Washington State University 2021
	</div>
	<nav class="wsu-footer-global__navigation">
		<ul class="wsu-menu-tertiary">
			<li>
				<a href="https://access.wsu.edu/">Access</a>
			</li>
			<li>
				<a href="https://policies.wsu.edu/">Policies</a>
			</li>
			<li>
				<a href="https://portal.wsu.edu/">MyWSU</a>
			</li>
			<li>
				<a href="https://socialmedia.wsu.edu/">Follow&nbsp;WSU</a>
			</li>
		</ul>
	</nav>
</footer>
<?php endif; ?>