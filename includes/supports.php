<?php namespace WSUWP\Theme\WDS;

class Supports {

	public static function init() {

		add_action( 'after_setup_theme', array( __CLASS__, 'theme_supports' ) );

	}


	public static function theme_supports() {

		load_theme_textdomain( 'wsuwpwebdesignsystem' );

		add_theme_support( 'post-thumbnails' );

		add_theme_support( 'title-tag' );

		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'script',
				'style',
			)
		);

		add_theme_support( 'editor-color-palette', array() );

		add_theme_support( 'disable-custom-colors' );

		add_theme_support( 'disable-custom-font-sizes' );

		add_theme_support( 'editor-font-sizes', array() );

		add_theme_support( 'disable-custom-gradients' );

		add_theme_support( 'editor-gradient-presets', array() );

		remove_theme_support( 'core-block-patterns' );

		remove_theme_support( 'block-templates' );

		add_post_type_support( 'page', 'excerpt' );

	}

}

Supports::init();
