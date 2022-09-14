<?php
	$page = $_GET["page"];
	$command = escapeshellcmd('python3.10 /var/www/html/genPages.py');
	$output = shell_exec($command);
	/*echo $output;*/

    header('Location: https://deco3801-dinosandcometsequaldeath.uqcloud.net/info.php?page=' . $page);
	exit();
?>
