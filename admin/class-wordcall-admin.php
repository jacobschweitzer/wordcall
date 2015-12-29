<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://ijas.me/
 * @since      1.0.0
 *
 * @package    Wordcall
 * @subpackage Wordcall/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Wordcall
 * @subpackage Wordcall/admin
 * @author     Jacob Schweitzer <allambition@gmail.com>
 */
class Wordcall_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wordcall_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wordcall_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/wordcall-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wordcall_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wordcall_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		wp_enqueue_script( $this->plugin_name . 'twilio-js-lib', '//static.twilio.com/libs/twiliojs/1.2/twilio.min.js', array( 'jquery' ), $this->version, true );
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/wordcall-admin.js', array( 'jquery', $this->plugin_name . 'twilio-js-lib' ), $this->version, true );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function create_settings_and_calling_page() {
		add_users_page( 'WordCall', 'WordCall', 'read', 'wordcall', array( $this, 'show_settings_and_calling_content' ) );
	}
	/**
	 * Show the Twilio API Settings and Calling content.
	 *
	 * @since    1.0.0
	 */
	public function show_settings_and_calling_content() {
		include_once( 'partials/wordcall-admin-header.php' );
		$this->check_for_and_save_form_data();
		$twilio_api_settings = $this->check_for_twilio_api_settings();
		if ( empty( $twilio_api_settings ) ) {
			$twilio_api_settings = array(
				'appsid'		=> '',
				'authtoken'		=> '',
				'captoken'		=> '',
				'phonenumber'	=> '',
			);
			include_once( 'partials/wordcall-settings-form.php' );
		} else {
			include ABSPATH . 'wp-content/plugins/wordcall/includes/twilio-php/Services/Twilio/Capability.php';
			$accountSid = $twilio_api_settings['appsid'];
			$authToken  = $twilio_api_settings['authtoken'];

			$token = new Services_Twilio_Capability( $accountSid, $authToken );
			$token->allowClientOutgoing( $twilio_api_settings['captoken'] );
			$translation_array = array(
				'twiliotoken' => $token->generateToken(),
			);
			wp_localize_script( $this->plugin_name, 'wordcall', $translation_array );

			include_once( 'partials/wordcall-phone-display.php' );
			include_once( 'partials/wordcall-settings-form.php' );
		}
		include_once( 'partials/wordcall-admin-footer.php' );
	}
	/**
	 * Check for Twilio API Settings.
	 *
	 * @since    1.0.0
	 */
	public function check_for_twilio_api_settings() {
		$user_id = get_current_user_id();
		$user_twilio_api_settings = get_user_meta( $user_id, 'twilio_api_settings', true );
		return $user_twilio_api_settings;
	}
	/**
	 * Check for settings form data and save if it is there.
	 *
	 * @since    1.0.0
	 */
	public function check_for_and_save_form_data() {
		if ( isset( $_POST['twiliosid'] ) || isset( $_POST['twilioauthtoken'] ) || isset( $_POST['twiliocapbailitytoken'] ) ) {
			$user_id = get_current_user_id();
			$twilio_api_settings = array(
				'appsid'		=> $_POST['twiliosid'],
				'authtoken'		=> $_POST['twilioauthtoken'],
				'captoken'		=> $_POST['twiliocapbailitytoken'],
				'phonenumber'	=> $_POST['twilionumber'],
			);
			update_user_meta( $user_id, 'twilio_api_settings', $twilio_api_settings );
		}
	}
}
