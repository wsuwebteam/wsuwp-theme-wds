<?php namespace WSUWP\Theme\WDS;


class Customizer {

	protected static $authorized = array(
		'danial.bleile@wsu.edu',
		'dan.white1@wsu.edu',
		'lesa.mckpeak@wsu.edu',
	);

	public static function get( $property ) {

		switch ( $property ) {
			case 'authorized':
				return self::$authorized;
			default:
				return '';
		}

	}


	public static function init() {

		require_once get_template_directory() . '/customizer/customizer_social.php';
		require_once get_template_directory() . '/customizer/customizer_contact.php';
		require_once get_template_directory() . '/customizer/customizer_global_header.php';
		require_once get_template_directory() . '/customizer/customizer_global_footer.php';
		require_once get_template_directory() . '/customizer/customizer_site_header.php';
		require_once get_template_directory() . '/customizer/customizer_site_footer.php';
		require_once get_template_directory() . '/customizer/customizer_site_navigation.php';
		require_once get_template_directory() . '/customizer/customizer_advanced.php';
		require_once get_template_directory() . '/customizer/customizer_template_home.php';
		require_once get_template_directory() . '/customizer/customizer_template_page.php';
		require_once get_template_directory() . '/customizer/customizer_template_post.php';
		require_once get_template_directory() . '/customizer/customizer_template_archive.php';
		require_once get_template_directory() . '/customizer/customizer_template_category.php';
		require_once get_template_directory() . '/customizer/customizer_template_tag.php';

		add_action( 'customize_register', array( __CLASS__, 'setup_customizer' ) );

	}


	public static function is_authorized_user() {

		$current_user = wp_get_current_user();

		if ( in_array( $current_user->user_email, self::$authorized ) ) {

			return true;

		} else {

			return false;

		}

	}

	public static function setup_customizer( $wp_customize ) {

		self::setup_theme_customizer( $wp_customize );

		self::setup_template_customizer( $wp_customize );

	}


	public static function setup_theme_customizer( $wp_customize ) {

		$customizers = array();

		$social = new Customizer_Social( $wp_customize );
		$contact = new Customizer_Contact( $wp_customize );
		$advanced = new Customizer_Advanced( $wp_customize );

		$panel = 'wds_theme_panel';

		$wp_customize->add_panel(
			$panel,
			array(
				'title' => __( 'WDS Theme Settings' ),
				'description' => 'Settings for WSU Web Design System Theme', // Include html tags such as <p>.
				'priority' => 160, // Mixed with top-level-section hierarchy.
			)
		);

		$customizers[] = new Customizer_Global_Header( $wp_customize, $panel );
		$customizers[] = new Customizer_Global_Footer( $wp_customize, $panel );
		$customizers[] = new Customizer_Site_Header( $wp_customize, $panel );
		$customizers[] = new Customizer_Site_Footer( $wp_customize, $panel );
		$customizers[] = new Customizer_Site_Navigation( $wp_customize, $panel );

	}

	public static function setup_template_customizer( $wp_customize ) {

		$customizers = array();

		$panel = 'wds_template_panel';

		$wp_customize->add_panel(
			$panel,
			array(
				'title' => __( 'WDS Templates' ),
				'description' => 'Settings for WSU Web Design System Theme', // Include html tags such as <p>.
				'priority' => 160, // Mixed with top-level-section hierarchy.
			)
		);

		$customizers[] = new Customizer_Template_Home( $wp_customize, $panel );
		$customizers[] = new Customizer_Template_Page( $wp_customize, $panel );
		$customizers[] = new Customizer_Template_Post( $wp_customize, $panel );
		$customizers[] = new Customizer_Template_Archive( $wp_customize, $panel );
		$customizers[] = new Customizer_Template_Category( $wp_customize, $panel );
		$customizers[] = new Customizer_Template_Tag( $wp_customize, $panel );

	}

}

Customizer::init();
