<?php
$page = $_GET["page"];
if (!file_exists("/var/www/html/pages/" . $page  . ".data")) {
		echo "error: /var/www/html/pages/" . $page  . ".data";
		header('Location: https://deco3801-dinosandcometsequaldeath.uqcloud.net/genPage.php?page=' . $page);
		exit();
}
$headerFile = file_get_contents("./pages/header.html", FILE_USE_INCLUDE_PATH);
$footerFile = file_get_contents("./pages/footer.html", FILE_USE_INCLUDE_PATH);
$file = file_get_contents("./pages/" . $page  . ".data", FILE_USE_INCLUDE_PATH);
//echo "page file: " . $page . "\n";
//echo "<file: " . $file . "\nfile>\n";
$data = explode("\======/", $file);
foreach ($data as &$value) {
		$value = preg_split("/\r\n|\n|\r/", $value);
		$i = 0;
		foreach ($value as &$line) {
				if ($line[0] == '#') {
						unset($value[$i]);
				}
				else if (substr($line, 0, 3) == '***') {
						$value[$i] = "</p><h3>" . substr($value[$i], 3) . "</h3><p>";
				}
				$i++;
		}
		$value = array_filter(array_values($value));
}
unset($value);
$title = $data[0][0];
$header = $data[0][1];
$body = $data[1];
/*$j = 0;
foreach ($data as &$value) {
		//echo $value;
		$k = $j; //the second array starts at 1??
		foreach ($value as &$ste) {
				echo "[" . $j . "][" . $k . "]: " . $ste;
				$k++;
		}
		$j++;
}
unset($value);
foreach ($body as &$value) {
		echo $value;
}
unset($value);*/
//echo "title: " . $title;

//echo "\n starting";
//Seperate body into paragraph and topics
$paras = [];
$breakpoint = 0;
$para = "";
for ($x = 0; $x <= 5; $x++) {
		//echo "\n\nnew paragraph";
		$count = 0;
		foreach ($body as &$line) {
			$count = $count + 1;
			//echo $count . "." . $breakpoint;
			//echo $line . "\n";
			if ($count <= $breakpoint) {
				//echo "\ncontinue";
				continue;
			}
			else if ($line === "\=====/") {
				$breakpoint = $count;
				//echo "\nbreak";
				break;
			}
			$para = $para . $line . "\n";
		}
		unset($line);
		$paras[] = $para;
		unset($para);
		//echo "\nlooped";
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title><?php
				echo $title;
				echo $headerFile; ?>
<!-- Set up template html code here-->
<h1><?php echo $header;?></h1>
<h2>An Article created by GPT3</h2>
<?php
//Isolate headings
foreach ($paras as $para) {
		echo explode("\n",$para)[0];
}

/*//Isolate paras
foreach ($paras as $para) {
		echo explode("\n",$para)[1];
}*/
//Echo everything
foreach ($paras as $para) {
		echo $para;
}
echo $footerFile;?>
</body>
</html>