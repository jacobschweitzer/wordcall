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
	<h2>Instructions</h2>
	<p>Here you will need to enter your Twilio phone number, accountSID, authorization token, and capability token.
	<br /><br />
	Find your accountSID and auth token here: <br />
	<a href="https://www.twilio.com/user/account/settings" target="_blank">Twilio Account Settings</a>
	<br />
	Note: Sometimes the primary auth token does not work, in this case create and use a secondary auth token.
	<br /><br />
	The capability token you can get by making a TwiML app, use the SID for the app as the Capability Token: 
	<br />
	<a href="https://www.twilio.com/user/account/voice/dev-tools/twiml-apps" target="_blank">Create TwiML app</a> 
	<br />
	For the Voice Request URL use this URL: <br />
	<?php echo plugins_url() . '/wordcall/includes/dial_number.php'; ?>
	</p>
	<form method="post" name="twiliosettings" id="twiliosettings">

		<label for="twilionumber">Twilio Phone Number</label>
		<input type="text" name="twilionumber" value="<?php echo $twilio_api_settings['phonenumber']; ?>" />
		<br />

		<label for="twiliosid">Twilio SID</label>
		<input type="text" name="twiliosid" value="<?php echo $twilio_api_settings['appsid']; ?>" />
		<br />

		<label for="twilioauthtoken">Twilio Auth Token</label>
		<input type="text" name="twilioauthtoken" value="<?php echo $twilio_api_settings['authtoken']; ?>" />
		<br />

		<label for="twiliocapbailitytoken">Twilio Capability Token</label>
		<input type="text" name="twiliocapbailitytoken" value="<?php echo $twilio_api_settings['captoken']; ?>" />
		<br />



		<input type="submit" value="Save" />
	</form>