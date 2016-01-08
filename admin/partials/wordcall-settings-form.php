<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://ijas.me/
 * @since      1.0.0
 *
 * @package    Wordcall
 * @subpackage Wordcall/admin/partials
 */
?>
	<br />
	<h2>Settings</h2>
	<p>Here you will need to enter your Twilio phone number, accountSID, authorization token, and capability token.
	<br /><br />
	</p>
	<form method="post" name="twiliosettings" id="twiliosettings">

		<label for="twilionumber"><strong>Twilio Phone Number</strong></label>
		<input type="text" name="twilionumber" value="<?php echo esc_attr( $twilio_api_settings['phonenumber'] ); ?>" />
		<br /><br />

		<h4>Twilio SID and Auth token</h4>
		Find your accountSID and auth token here: <br />
		<a href="https://www.twilio.com/user/account/settings" target="_blank">Twilio Account Settings</a>
		<br />
		Note: If primary auth token does not work then try to create and use a secondary auth token.
		<br /><br />
		<label for="twiliosid"><strong>Twilio SID</strong></label>
		<input type="text" name="twiliosid" value="<?php echo esc_attr( $twilio_api_settings['appsid'] ); ?>" />
		<br />

		<label for="twilioauthtoken"><strong>Twilio Auth Token</strong></label>
		<input type="text" name="twilioauthtoken" value="<?php echo esc_attr( $twilio_api_settings['authtoken'] ); ?>" />
		<br /><br />

		<h4>TwiML App SID</h4>
		The TwiML App SID you can get by making a TwiML app here: 
		<br />
		<a href="https://www.twilio.com/user/account/voice/dev-tools/twiml-apps" target="_blank">Create TwiML app</a> 
		<br />
		For the Voice Request URL use this URL: <br />
		<?php echo esc_url( plugins_url() . '/wordcall/includes/dial_number.php' ); ?>
		<br/>
		<label for="twiliocapbailitytoken"><strong>Twilio Capability Token</strong></label>
		<input type="text" name="twiliocapbailitytoken" value="<?php echo esc_attr( $twilio_api_settings['captoken'] ); ?>" />
		<br />

		<?php wp_nonce_field( 'twilio_settings_nonce_action', 'twilio_settings_nonce_field' ); ?>

		<input type="submit" value="Save" />
	</form>
