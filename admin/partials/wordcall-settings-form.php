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
	<p>Here you will need to enter your account Sid, authorization token, and capability token.</p>
	<form method="post" name="twiliosettings" id="twiliosettings">
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