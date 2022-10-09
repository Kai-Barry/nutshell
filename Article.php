<?php
// composer require unsplash/unsplash
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

$headings = [];
$i = 0;
//Isolate headings
foreach ($paras as $para) {
    $headings[$i] = explode("\n",$para)[0];
    $i++;
}

//Isolate paras
$paragraphs = [];
$i = 0;
//Isolate headings
foreach ($paras as $para) {
    $paragraphs[$i] = explode("\n",$para)[1];
    $i++;
}

$search = "dinosaur";
$page = 1;
$per_page = 5;
$orientation = "landscape";

// $testimage = 'https://images.unsplash.com/photo-1606856110002-d0991ce78250?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80';
// $photos = Unsplash\Search::photos($search, $page, $per_page, $orientation);
?>
<!DOCTYPE html>
<html>
    <head>
    <!--insert header code here-->
	    <title><?php
                echo $title;
		        echo $headerFile; ?>
        <div class="jumptomenu">
            <div class="jumpto">
                <div class="sub1">
                    <a href="#Sub1" id="subOne"><?php echo $headings[1];?></a>
                </div>
                <div class="sub2">
                    <a href="#Sub2" id="subTwo"><?php echo $headings[2];?></a>
                </div>
                <div class="sub3">
                    <a href="#Sub3" id="subThree"><?php echo $headings[3];?></a>
                </div>
                <div class="sub4">
                    <a href="#Sub4" id="subFour"><?php echo $headings[4];?></a>
                </div>
            </div>
        </div>
        <div class="textPlus">
            <div class="article">
                <div class="artHead">
                    <div class="artHeadtxt">
                        <h1><?php echo $header;?></h1>
                        <p><?php echo $paragraphs[0];?></p>
                    </div>
                    <div class="artHeadimg">
                        <img src='images/placeholder.jpg'>
                    </div>
                </div>
                <br>
                <hr>
                <br>
                <div class="artSub1">
                    <div class="sub1img">
                        <img src="images/placeholder.jpg">
                    </div>
                    <div class="sub1txt">
                        <h3 id="Sub1">Sub1</h3>
                        <p><?php echo $paragraphs[1];?></p>
                    </div>
                </div>
                <br>
                <hr>
                <br>
                <div class="artSub2">
                    <div class="sub2txt">
                        <h3 id="Sub2">Sub2</h3>
                        <p><?php echo $paragraphs[2];?></p>
                    </div>
                    <div class="sub2img">
                        <img src="images/placeholder.jpg">
                    </div>
                </div>
                <br>
                <hr>
                <br>
                <div class="artSub3">
                    <div class="sub3img">
                        <img src="images/placeholder.jpg">
                    </div>
                    <div class="sub3txt">
                        <h3 id="Sub3"><?php echo $paragraphs[3];?></h3>
                        <p>sub3</p>
                    </div>
                </div>
                <br>
                <hr>
                <br>
                <div class="artSub4">
                    <div class="sub4txt">
                        <h3 id="Sub4"><?php echo $paragraphs[4];?></h3>
                        <p>sub4</p>
                    </div>
                    <div class="sub4img">
                        <img src="images/placeholder.jpg">
                    </div>
                </div>
            </div>
            <div class="wantMore">
                <h2>Want More?</h2>
                <div class="moreArt">
                    <div class="relate1">
                        <img src="images/placeholder.jpg">
                        <h2>Art1</h2>
                    </div>
                    <div class="relate2">
                        <img src="images/placeholder.jpg">
                        <h2>Art2</h2>
                    </div>
                    <div class="relate3">
                        <img src="images/placeholder.jpg">
                        <h2>Art3</h2>
                    </div>               
                </div>
            </div>
        </div>
        <!--insert body code here-->
        <?php echo $footerFile;?>
    </body>
</html>
