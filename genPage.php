<?php
	$page = $_GET["page"];
	$command = escapeshellcmd('/var/www/html/genPage.sh ' . $page);
	$output = shell_exec($command .  " 2>&1 &");
	echo $output;
	if ($output="Success") {
		//echo "passed";
		header('Location: https://deco3801-dinosandcometsequaldeath.uqcloud.net/info.php?page=' . $page);
	}
	exit();
?>
