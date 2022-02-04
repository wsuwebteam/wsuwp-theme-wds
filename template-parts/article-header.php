<?php if ( is_front_page() ) : ?>
	<?php if ( get_theme_mod( 'wsu_wds_template_home_breadcrumbs', false ) ) : ?><?php get_template_part( 'template-component/component-breadcrumb' ); ?><?php endif; ?>
	<?php if ( get_theme_mod( 'wsu_wds_template_home_show_title', true ) ) : ?>
		<header class="wsu-article-header">
			<h1  class="wsu-article-header__title"><?php the_title(); ?></h1>
			<?php if ( get_theme_mod( 'wsu_wds_template_home_show_publish_date', false ) ) : ?><?php get_template_part( 'template-component/component-post-published-date' ); ?><?php endif; ?>
			<?php if ( get_theme_mod( 'wsu_wds_template_home_show_share', false ) ) : ?><?php get_template_part( 'template-component/component-post-social-share' ); ?><?php endif; ?>
		</header>
	<?php endif; ?>
<?php elseif ( is_home() ) : ?>
	<?php if ( get_theme_mod( 'wsu_wds_template_home_breadcrumbs', false ) ) : ?><?php get_template_part( 'template-component/component-breadcrumb' ); ?><?php endif; ?>
		<header class="wsu-article-header">
			<h1  class="wsu-article-header__title"><?php get_bloginfo( 'name' ); ?></h1>
			<?php if ( get_theme_mod( 'wsu_wds_template_home_show_publish_date', false ) ) : ?><?php get_template_part( 'template-component/component-post-published-date' ); ?><?php endif; ?>
			<?php if ( get_theme_mod( 'wsu_wds_template_home_show_share', false ) ) : ?><?php get_template_part( 'template-component/component-post-social-share' ); ?><?php endif; ?>
		</header>
<?php elseif ( is_page() ) : ?>
	<?php if ( get_theme_mod( 'wsu_wds_template_page_breadcrumbs', true ) ) : ?><?php get_template_part( 'template-component/component-breadcrumb' ); ?><?php endif; ?>
	<?php if ( get_theme_mod( 'wsu_wds_template_page_show_title', true ) ) : ?>
		<header class="wsu-article-header">
			<h1  class="wsu-article-header__title"><?php the_title(); ?></h1>
			<?php if ( get_theme_mod( 'wsu_wds_template_page_show_publish_date', false ) ) : ?><?php get_template_part( 'template-component/component-post-published-date' ); ?><?php endif; ?>
			<?php if ( get_theme_mod( 'wsu_wds_template_page_show_share', false ) ) : ?><?php get_template_part( 'template-component/component-post-social-share' ); ?><?php endif; ?>
		</header>
	<?php endif; ?>
<?php elseif ( is_single() ) : ?>
	<?php if ( get_theme_mod( 'wsu_wds_template_post_breadcrumbs', true ) ) : ?><?php get_template_part( 'template-component/component-breadcrumb' ); ?><?php endif; ?>
	<?php if ( get_theme_mod( 'wsu_wds_template_post_show_title', true ) ) : ?>
		<header class="wsu-article-header">
			<h1  class="wsu-article-header__title"><?php the_title(); ?></h1>
			<?php if ( get_theme_mod( 'wsu_wds_template_post_show_publish_date', true ) ) : ?><?php get_template_part( 'template-component/component-post-published-date' ); ?><?php endif; ?>
			<?php if ( get_theme_mod( 'wsu_wds_template_post_show_share', true ) ) : ?><?php get_template_part( 'template-component/component-post-social-share' ); ?><?php endif; ?>
		</header>
	<?php endif; ?>
<?php elseif ( is_singular() ) : ?>
	<?php if ( get_theme_mod( 'wsu_wds_template_' . get_post_type() . '_breadcrumbs', true ) ) : ?><?php get_template_part( 'template-component/component-breadcrumb' ); ?><?php endif; ?>
	<?php if ( get_theme_mod( 'wsu_wds_template_' . get_post_type() . '_show_title', true ) ) : ?>
		<header class="wsu-article-header">
			<h1  class="wsu-article-header__title"><?php the_title(); ?></h1>
			<?php if ( get_theme_mod( 'wsu_wds_template_' . get_post_type() . '_show_publish_date', false ) ) : ?><?php get_template_part( 'template-component/component-post-published-date' ); ?><?php endif; ?>
			<?php if ( get_theme_mod( 'wsu_wds_template_' . get_post_type() . '_show_share', false ) ) : ?><?php get_template_part( 'template-component/component-post-social-share' ); ?><?php endif; ?>
		</header>
	<?php endif; ?>
<?php elseif ( is_category() ) : ?>
	<?php if ( get_theme_mod( 'wsu_wds_template_category_breadcrumbs', true ) ) : ?><?php get_template_part( 'template-component/component-breadcrumb' ); ?><?php endif; ?>
		<header class="wsu-article-header">
			<h1  class="wsu-article-header__title"><?php single_term_title(); ?></h1>
			<?php if ( get_theme_mod( 'wsu_wds_template_category_show_share', true ) ) : ?><?php get_template_part( 'template-component/component-post-social-share' ); ?><?php endif; ?>
		</header>
<?php elseif ( is_tag() ) : ?>
	<?php if ( get_theme_mod( 'wsu_wds_template_tag_breadcrumbs', true ) ) : ?><?php get_template_part( 'template-component/component-breadcrumb' ); ?><?php endif; ?>
		<header class="wsu-article-header">
			<h1  class="wsu-article-header__title"><?php single_term_title(); ?></h1>
			<?php if ( get_theme_mod( 'wsu_wds_template_tag_show_share', true ) ) : ?><?php get_template_part( 'template-component/component-post-social-share' ); ?><?php endif; ?>
		</header>
<?php elseif ( is_tax() ) : ?>
	<?php if ( get_theme_mod( 'wsu_wds_template_taxonomy_breadcrumbs', true ) ) : ?><?php get_template_part( 'template-component/component-breadcrumb' ); ?><?php endif; ?>
		<header class="wsu-article-header">
			<h1  class="wsu-article-header__title"><?php single_term_title(); ?></h1>
			<?php if ( get_theme_mod( 'wsu_wds_template_taxonomy_show_share', true ) ) : ?><?php get_template_part( 'template-component/component-post-social-share' ); ?><?php endif; ?>
		</header>
<?php elseif ( is_author() ) : ?>
	<?php if ( get_theme_mod( 'wsu_wds_template_author_breadcrumbs', true ) ) : ?><?php get_template_part( 'template-component/component-breadcrumb' ); ?><?php endif; ?>
	<header class="wsu-article-header">
		<h1  class="wsu-article-header__title"><?php the_archive_title(); ?></h1>
		<?php if ( get_theme_mod( 'wsu_wds_template_author_show_share', true ) ) : ?><?php get_template_part( 'template-component/component-post-social-share' ); ?><?php endif; ?>
	</header>
<?php elseif ( is_attachment() ) : ?>
	<?php if ( get_theme_mod( 'wsu_wds_template_attachment_breadcrumbs', true ) ) : ?><?php get_template_part( 'template-component/component-breadcrumb' ); ?><?php endif; ?>
	<header class="wsu-article-header">
		<h1  class="wsu-article-header__title"><?php the_archive_title(); ?></h1>
		<?php if ( get_theme_mod( 'wsu_wds_template_attachment_show_share', true ) ) : ?><?php get_template_part( 'template-component/component-post-social-share' ); ?><?php endif; ?>
	</header>
<?php elseif ( is_post_type_archive() ) : ?>
	<?php if ( get_theme_mod( 'wsu_wds_template_archive_breadcrumbs', true ) ) : ?><?php get_template_part( 'template-component/component-breadcrumb' ); ?><?php endif; ?>
	<header class="wsu-article-header">
		<h1  class="wsu-article-header__title"><?php post_type_archive_title(); ?></h1>
		<?php if ( get_theme_mod( 'wsu_wds_template_archive_show_share', true ) ) : ?><?php get_template_part( 'template-component/component-post-social-share' ); ?><?php endif; ?>
	</header>
<?php else : ?>
	<?php get_template_part( 'template-component/component-breadcrumb' ); ?>
	<header class="wsu-article-header">
		<h1  class="wsu-article-header__title"><?php the_archive_title(); ?></h1>
		<?php get_template_part( 'template-component/component-post-published-date' ); ?>
		<?php get_template_part( 'template-component/component-post-social-share' ); ?>
	</header>
<?php endif; ?>
