<?php

/**
 * @since      1.0.0
 *
 * @package    Yourgood_Btn
 * @subpackage Yourgood_Btn/public
 */

/**
 * @package    Yourgood_Btn
 * @subpackage Yourgood_Btn/public
 */
class YGBTN_Public {

	private $YGBTN;

	private $version;

	public function __construct( $YGBTN, $version ) {

		$this->YGBTN = $YGBTN;
		$this->version = $version;

	}
	
	public function ygbtn_adding_script() {
		
		$api = get_option('ygbtn_api_field');

		if (!empty(isset($api)) || $api !== '') {
			echo '<script id="ygbtn-plugin-script" data-pf-id="' . esc_attr($api) . '" src="https://widget.yourgood.app/script/widget.js?id=' . esc_attr($api) . '"></script>';
		}
	}
}
