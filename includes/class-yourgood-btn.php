<?php

/**
 * @since      1.0.0
 *
 * @package    Yourgood_Btn
 * @subpackage Yourgood_Btn/includes
 */

/**
 * @since      1.0.0
 * @package    Yourgood_Btn
 * @subpackage Yourgood_Btn/includes
 */
class YGBTN {

	protected $loader;

	protected $yourgood_btn;

	protected $version;

	public function __construct() {
		if ( defined( 'YGBTN_VERSION' ) ) {
			$this->version = YGBTN_VERSION;
		} else {
			$this->version = '1.0.0';
		}
		$this->YGBTN = 'YGBTN';

		$this->load_dependencies();
		$this->define_admin_hooks();
		$this->define_public_hooks();

	}

	private function load_dependencies() {

		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-yourgood-btn-loader.php';

		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-yourgood-btn-admin.php';

		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-yourgood-btn-public.php';

		$this->loader = new YGBTN_Loader();

	}

	private function define_admin_hooks() {

		$plugin_admin = new YGBTN_Admin( $this->get_yourgood_btn(), $this->get_version() );

		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );

	}

	private function define_public_hooks() {

		$plugin_public = new YGBTN_Public( $this->get_yourgood_btn(), $this->get_version() );

		$this->loader->add_action( 'wp_head', $plugin_public, 'ygbtn_adding_script' );

	}

	public function run() {
		$this->loader->run();
	}

	public function get_yourgood_btn() {
		return $this->YGBTN;
	}

	public function get_loader() {
		return $this->loader;
	}

	public function get_version() {
		return $this->version;
	}

}
