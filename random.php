<?php
	$files = glob($dir . 'pages/*.data');/**/
    	$file = array_rand($files);
	/*foreach ($files as &$value) {
                echo $value;
	}
	unset($value);*/
    	header('Location: https://deco3801-dinosandcometsequaldeath.uqcloud.net/info.php?page=' . substr($files[$file], 6, strlen($file)-6));
	exit();
?>
