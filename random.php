<?php
	$files = glob($dir . 'pages/*.data');
    $file = array_rand($files);
    header('Location: https://deco3801-dinosandcometsequaldeath.uqcloud.net/info.php?page=' . substr($files[$file], 6, strlen($files[$file])-strlen("pages/.data")));
	exit();
?>
