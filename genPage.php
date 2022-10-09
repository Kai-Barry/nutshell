<?php
	$page = $_GET["page"];
	$command = escapeshellcmd('/var/www/html/genPage.sh "' . $page .  '" 2>&1 &');
	$output = shell_exec($command);
	echo $output;
	if (strpos($output, "Success") !== false || strpos($output, "Page exists") !== false) {
		//echo "passed";
		if (strpos($output, "Success") !== false) {
			$page = explode(": ", $output)[1];
			$files = json_decode(file_get_contents('dict.json'), true);
			$files["pages/" . $page  . ".data"] = 0;
			file_put_contents("dict.json",json_encode($files));
		}
		header('Location: https://deco3801-dinosandcometsequaldeath.uqcloud.net/info.php?page=' . $page);
	}
	exit();
?>

