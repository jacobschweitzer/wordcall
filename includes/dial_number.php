<?php
header('Content-type: text/xml');
if ( isset( $_REQUEST["tocall"] ) ) {
?>
<Response>
<Dial callerId="<?php echo htmlspecialchars($_REQUEST["phonenumber"]); ?>"><?php echo htmlspecialchars($_REQUEST["tocall"]); ?></Dial>
</Response>
<?php } else { ?>
<Response> 
	<Dial callerId="<?php echo htmlspecialchars($_REQUEST["From"]); ?>"><Client>wordcall</Client></Dial>
</Response>
<?php } ?>