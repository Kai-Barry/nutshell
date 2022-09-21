<?php
	$page = $_GET["page"];
	$command = escapeshellcmd('/var/www/html/genPage.sh ' . $page);
	$output = shell_exec($command .  " 2>&1 &");
	echo $output;
	if ($output="Success") {
    	header('Location: https://deco3801-dinosandcometsequaldeath.uqcloud.net/info.php?page=' . $page);
	}
	exit();
?>
