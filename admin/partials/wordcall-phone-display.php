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
	<h2>Make Calls</h2>
	<!-- @start snippet -->
	Number to call: <input type="text" name="tocall" id="tocall" value="">
	<input type="button" name="call" id="call" value="Start Call"/>
	<input type="button" name="hangup" id="hangup" value="Hangup Call" style="display:none;"/>
	<input type="text" name="phonenumber" id="phonenumber" value="<?php echo esc_attr( $twilio_api_settings['phonenumber'] ); ?>" style="display:none;"/>
	<div id="status">
		Offline
	</div>
	<div id="dialpad" style="display:none;">
		<table>
		<tr>
		<td><input type="button" value="1" id="button1"></td>
		<td><input type="button" value="2" id="button2"></td>
		<td><input type="button" value="3" id="button3"></td>
		</tr>
		<tr>
		<td><input type="button" value="4" id="button4"></td>
		<td><input type="button" value="5" id="button5"></td>
		<td><input type="button" value="6" id="button6"></td>
		</tr>
		<tr>
		<td><input type="button" value="7" id="button7"></td>
		<td><input type="button" value="8" id="button8"></td>
		<td><input type="button" value="9" id="button9"></td>
		</tr>
		<tr>
		<td><input type="button" value="*" id="buttonstar"></td>
		<td><input type="button" value="0" id="button0"></td>
		<td><input type="button" value="#" id="buttonpound"></td>
		</tr>
		</table>
	</div>
	<!-- @end snippet -->
