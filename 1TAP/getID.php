<?php
    $cardid=$_POST["cardid"];
	$Write="<?php $" . "cardid='" . $cardid . "'; " . "echo $" . "cardid;" . " ?>";
	file_put_contents('cardidcontainer.php',$Write);
    echo "success";
?>