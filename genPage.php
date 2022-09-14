<?php
	$page = $_GET["page"];
	$files = glob($dir . 'pages/*.data');/**/
    $file = array_rand($files);

	$command = escapeshellcmd('python3.10 /var/www/html/genPages.py');
	$output = shell_exec($command);
	/*echo $output;*/)

    header('Location: https://deco3801-dinosandcometsequaldeath.uqcloud.net/info.php?page=' . substr($files[$file], 6, strlen($file)-6));
	exit();
?>
