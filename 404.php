<?php namespace WSUWP\Theme\WDS; 

?>
<?php get_header(); ?>
<?php get_template_part( 'template-component/component-global-header', '404' ); ?>
<?php Theme_Blocks::render( 'header_global' ); ?>
<?php Theme_Blocks::render_option( 'site_header' ); ?>
<?php Theme_Blocks::render( 'navigation_mobile' ); ?>
<?php Theme_Blocks::render( 'navigation_vertical' ); ?>
<?php Theme_Blocks::render( 'header_quicklinks' ); ?>
<?php get_template_part( 'template-component/component-site-navigation-vertical', '404' ); ?>
<!-- SITE WRAPPER:START -->
<div class="wsu-wrapper-site">
	<!-- SITE CONTAINER:START -->
	<?php get_template_part( 'template-component/component-site-header', '404' ); ?>
	<?php Theme_Blocks::render( 'navigation_audience' ); ?>
	<div class="wsu-wrapper-content <?php echo esc_attr( WDS_Options::get_option_class( 'template', 'width', 'wsu-wrapper-content--' ) ); ?>">
		<?php do_action('wsu_wds_theme_before_main', '404'); ?>
		<main role="main" id="wsu-content" class="wsu-wrapper-main" tabindex="-1">
			<?php do_action('wsu_wds_theme_main', '404'); ?>
			<?php if ( get_theme_mod( 'wsu_wds_template_search_show_breadcrumbs', true ) ) : ?><?php get_template_part( 'template-component/component-breadcrumb', '404' ); ?><?php endif; ?>
			<?php do_action('wsu_wds_theme_after_breadcrumbs', '404'); ?>
			<header class="wsu-page-header">
				<h1  class="wsu-page-header__title">Page Not Found</h1>
			</header>
			<?php do_action('wsu_wds_theme_after_header', '404'); ?>
			<p>
				We're sorry, but the page you are looking for could not be found. 
				Please try our site search or one of the links below.
			</p>
			<ul>
				<li><a href="https://index.wsu.edu">The A-Z Directory</a> (an alphabetical list of departments, programs, resources, organizations, and more)</li>
				<li><a href="https://wsu.edu/academics/">Academic Departments</a> (a list of links to all academic departments)</li>
				<li><a href="https://wsu.edu/about/services/">Administrative Offices and Resources</a> (a list of links to all administrative offices and resources)</li>
				<li><a href="https://wsu.edu/admission/">Admissions and Aid</a> (information for prospective students about applying, tuition, financial aid, and more)</li>
				<li><a href="https://wsu.edu/contact/">Contact Us</a> (phone and email contacts)</li>
			</ul>
			<?php do_action('wsu_wds_theme_after_content', '404'); ?>
		</main>
		<?php do_action('wsu_wds_theme_after_main', '404'); ?>
	</div>
	<?php do_action('wsu_wds_theme_before_footer', '404'); ?>
	<?php get_template_part( 'template-component/component-site-footer', '404' ); ?>
	<!-- SITE CONTAINER:END -->
</div>
<!-- SITE WRAPPER:END -->
<?php get_template_part( 'template-component/component-global-footer', '404' ); ?>
<?php get_footer(); ?>