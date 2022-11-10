<?php namespace WSUWP\Theme\WDS; 


class Block_Customizer_Header_Campus extends Block_Customizer {

	protected $title      = 'Header | Campus';
	protected $desc       = '';
	protected $section_id = 'wsu_theme_block_header_campus';
	protected $option_slug = '';

	public function add_customizer( $wp_customize, $panel_type, $args, $option_slug ) {

		$this->option_slug = $option_slug;

		$wp_customize->add_section(
			$this->section_id,
			array(
				'title'       => $this->title,
				'description' => $this->desc,
				'capability'  => 'edit_theme_options',
				'panel'       => $this->get_panel( $panel_type ),
				'priority'    => 2,
			)
		);

		$wp_customize->add_setting(
			$this->get_option_id( 'show' ),
			array(
				'capability' => 'edit_theme_options',
				'default'    => '',
				'type'       => 'option',
			)
		);

		$wp_customize->add_control(
			$this->get_option_id_slug( 'show' ) . '_control',
			array(
				'settings'    => $this->get_option_id( 'show' ),
				'type'        => 'checkbox',
				'section'     => $this->section_id,
				'label'       => __( 'Show Campus Header' ),
			)
		);

		$wp_customize->add_setting(
			$this->get_option_id( 'menuDepth' ),
			array(
				'capability' => 'edit_theme_options',
				'default'    => 3,
				'type'       => 'option',
			)
		);

		$wp_customize->add_control(
			$this->get_option_id_slug( 'menuDepth' ) . 'control',
			array(
				'settings'    => $this->get_option_id( 'menuDepth' ),
				'type'        => 'select',
				'section'     => $this->section_id,
				'label'       => 'Menu Depth',
				'description' => '',
				'choices'     => array(
					1 => '1 Level',
					2 => '2 Levels',
					3 => '3 Levels',
				),
			)
		);

	}


	protected function get_option_id( $setting ) {

		return 'wsu_wds[' . $this->option_slug . '][' . $setting . ']';

	}

	protected function get_option_id_slug( $setting ) {

		$option_id = $this->get_option_id( $setting );

		return str_replace( array( '[', ']' ), '_', $option_id );
		
	}

}

