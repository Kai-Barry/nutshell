<?php
	$page = $_GET["page"];
	$command = escapeshellcmd('/var/www/html/genPage.sh ' . $page);
	$output = ($command .  " 2>&1 &");
    header('Location: https://deco3801-dinosandcometsequaldeath.uqcloud.net/info.php?page=' . $page);
	exit();
?>
