<?php namespace WSUWP\Theme\WDS;


class Block_Customizer {

	protected $theme_panel = 'wds_theme_options_panel';
	protected $block_panel = '';


	public function get_panel( $panel_type ) {

		switch ( $panel_type ) {

			case 'theme':
				return $this->theme_panel;
				break;
			case 'block':
				return $this->block_panel;
		}

		return '';

	}

}