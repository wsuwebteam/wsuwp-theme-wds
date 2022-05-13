<?php namespace WSUWP\Theme\WDS; 

?>
<?php get_header(); ?>
<?php get_template_part( 'template-component/component-global-header', 'search' ); ?>
<?php get_template_part( 'template-component/component-site-navigation-vertical', 'search' ); ?>
<!-- SITE WRAPPER:START -->
<div class="wsu-wrapper-site">
	<!-- SITE CONTAINER:START -->
	<?php get_template_part( 'template-component/component-site-header', 'search'); ?>
	<div class="wsu-wrapper-content <?php echo esc_attr( WDS_Options::get_option_class( 'template', 'width', 'wsu-wrapper-content--' ) ); ?>">
		<?php do_action( 'wsu_wds_theme_before_main', 'search'); ?>
		<main role="main" id="wsu-content" class="wsu-wrapper-main" tabindex="-1">
			<?php do_action( 'wsu_wds_theme_main', 'search'); ?>
			<?php if ( get_theme_mod( 'wsu_wds_template_search_show_breadcrumbs', true ) ) : ?><?php get_template_part( 'template-component/component-breadcrumb', 'search' ); ?><?php endif; ?>
			<?php do_action( 'wsu_wds_theme_after_breadcrumbs', 'search'); ?>
			<header class="wsu-page-header">
				<h1  class="wsu-page-header__title">Search</h1>
			</header>
			<?php if ( ! empty( $_REQUEST['s'] ) ) : ?>
				<?php get_search_form( array('echo' => true ) ); ?> 
				<?php if ( have_posts() ) : ?>
					<ul class="wsu-search-results">
					<?php while ( have_posts() ) : the_post(); ?>
					<li>
						<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> 
						<?php the_excerpt(); ?>
						<div class="wsu-meta-date"><time><?php the_date(); ?></time></div>
					</li>
					<?php endwhile; ?>
					</ul>
					<?php get_template_part( 'template-component/component-pagination', 'archive' ); ?>
				<?php endif; ?>
			<?php endif; ?>
			<?php do_action('wsu_wds_theme_after_header', 'search'); ?>
			<?php get_template_part( 'template-component/component-search-block', 'search' ); ?>
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