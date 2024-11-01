<?php

/**
 * @since      1.0.0
 *
 * @package    Yourgood_Btn
 * @subpackage Yourgood_Btn/admin
 */

/**
 * @package    Yourgood_Btn
 * @subpackage Yourgood_Btn/admin
 */
class YGBTN_Admin {

	private $YGBTN;

	private $version;

	public function __construct( $YGBTN, $version ) {
		
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/partials/yourgood-btn-admin-display.php';

		$this->YGBTN = $YGBTN;
		$this->version = $version;

	}

	public function enqueue_styles() {

		wp_enqueue_style( $this->YGBTN, plugin_dir_url( __FILE__ ) . 'css/yourgood-btn-admin.css', array(), '1.0.12', 'all' );

	}

}
