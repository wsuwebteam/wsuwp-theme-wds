<?php namespace WSUWP\Theme\WDS; 

$search_term = ( ! empty( $_REQUEST['s'] ) ) ? sanitize_text_field( $_REQUEST['s'] ) : '';
?>
<?php get_header(); ?>
<?php get_template_part( 'template-component/component-global-header', 'search' ); ?>
<?php Theme_Blocks::render( 'header_global' ); ?>
<?php Theme_Blocks::render_option( 'site_header' ); ?>
<?php Theme_Blocks::render( 'navigation_mobile' ); ?>
<?php Theme_Blocks::render( 'navigation_vertical' ); ?>
<?php Theme_Blocks::render( 'header_quicklinks' ); ?>
<?php get_template_part( 'template-component/component-site-navigation-vertical', 'search' ); ?>
<!-- SITE WRAPPER:START -->
<div class="wsu-wrapper-site">
	<!-- SITE CONTAINER:START -->
	<?php get_template_part( 'template-component/component-site-header', 'search'); ?>
	<?php Theme_Blocks::render( 'navigation_audience' ); ?>
	<div class="wsu-wrapper-content <?php echo esc_attr( WDS_Options::get_option_class( 'template', 'width', 'wsu-wrapper-content--' ) ); ?>">
		<?php do_action( 'wsu_wds_theme_before_main', 'search'); ?>
		<main role="main" id="wsu-content" class="wsu-wrapper-main" tabindex="-1">
			<?php do_action( 'wsu_wds_theme_main', 'search'); ?>
			<?php if ( get_theme_mod( 'wsu_wds_template_search_show_breadcrumbs', true ) ) : ?><?php get_template_part( 'template-component/component-breadcrumb', 'search' ); ?><?php endif; ?>
			<?php do_action( 'wsu_wds_theme_after_breadcrumbs', 'search'); ?>
			<header class="wsu-page-header">
				<h1  class="wsu-page-header__title">Search</h1>
			</header>
			<section class="wsu-section  wsu-width--full wsu-spacing-after--xxmedium">
    			<div class="wsu-section__inner wsu-width--content">    
					<form class="wsu-search " method="get" action="<?php echo get_site_url(); ?>">
						<div class="wsu-search__search-bar">
							<input class="wsu-search__input" type="text" aria-lable="Search input" placeholder="Search" name="s" value="<?php echo $search_term; ?>" />
							<button class="wsu-search__submit" aria-lable="Submit Search"></button>
						</div>

						<div class="wsu-search__search-options">
							<input type="radio" class="wsu-search__search-toggle" id="wsu-search__search-toggle-site" name="search_context" value="site" <?php if ( empty( $_REQUEST['search_context'] ) || 'site' === $_REQUEST['search_context'] ) : ?> checked="checked"<?php endif; ?> /><label for="wsu-search__search-toggle-site" class="wsu-search__search-toggle-label">Search <?php echo wp_parse_url( get_site_url(), PHP_URL_HOST ); ?></label>
							<input type="radio" class="wsu-search__search-toggle" id="wsu-search__search-toggle-wsu" name="search_context" value="wsu" <?php if ( 'wsu' === $_REQUEST['search_context'] ) : ?> checked="checked"<?php endif; ?> /><label for="wsu-search__search-toggle-wsu" class="wsu-search__search-toggle-label">Search all wsu.edu</label>
						</div>

					</form>
    			</div>
			</section>
			<script async src="https://cse.google.com/cse.js?cx=54e8a42262bb5e5f2"></script>
			<div class="gcse-searchresults-only" data-queryParameterName="s" <?php if ( empty( $_REQUEST['search_context'] ) || 'site' === $_REQUEST['search_context'] ) : ?>data-as_sitesearch="<?php echo get_site_url(); ?>"<?php endif; ?>></div>
			<?php if ( ! empty( $_REQUEST['s'] ) ) : ?>
			<?php endif; ?>
			<?php do_action('wsu_wds_theme_after_header', 'search'); ?>
			<?php do_action('wsu_wds_theme_after_content', 'search'); ?>
		</main>
		<?php do_action('wsu_wds_theme_after_main', 'search'); ?>
	</div>
	<?php do_action('wsu_wds_theme_before_footer', 'search'); ?>
	<?php get_template_part( 'template-component/component-site-footer', 'search' ); ?>
	<!-- SITE CONTAINER:END -->
</div>
<!-- SITE WRAPPER:END -->
<?php get_template_part( 'template-component/component-global-footer', 'search' ); ?>
<?php get_footer(); ?>