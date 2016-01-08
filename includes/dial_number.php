<?php
header('Content-type: text/xml');
?>
<Response>
<Dial callerId="<?php echo htmlspecialchars($_REQUEST["phonenumber"]); ?>"><?php echo htmlspecialchars($_REQUEST["tocall"]); ?></Dial>
</Response>
