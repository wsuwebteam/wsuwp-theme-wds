  
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=EDGE">
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" >
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="icon" href="https://repo.wsu.edu/favicon/icon.svg">
	<link rel="apple-touch-icon" sizes="180x180" href="https://repo.wsu.edu/favicon/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="https://repo.wsu.edu/favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="https://repo.wsu.edu/favicon/favicon-16x16.png">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<a class="wsu-skip-to-main" href="#wsu-site-menu">Skip to menu</a>
	<a class="wsu-skip-to-main" href="#wsu-content">Skip to content</a>
	<?php wp_body_open();?>
	<!-- GLOBAL CONTAINER:START -->
	<div class="wsu-wrapper-global">
	<?php if ( is_active_sidebar( 'wsu_wds_before_header' ) ) : ?><div class="wsu-widget-area__before-header">
		<?php dynamic_sidebar( 'wsu_wds_before_header' ); ?>
	</div>
<?php endif; ?>