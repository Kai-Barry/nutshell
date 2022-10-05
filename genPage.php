<?php
	$page = $_GET["page"];
	$command = escapeshellcmd('/var/www/html/genPage.sh "' . $page .  '" 2>&1 &');
	$output = shell_exec($command);
	echo $output;
	if (strpos($output, "Success") !== false || strpos($output, "Page exists") !== false) {
		//echo "passed";
		header('Location: https://deco3801-dinosandcometsequaldeath.uqcloud.net/info.php?page=' . $page);
	}
	exit();
?>

