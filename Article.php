<?php
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
    <!--insert header code here-->
	    <title><?php
                echo $title;
		        echo $headerFile; ?>
        <div class="jumptomenu">
            <div class="jumpto">
                <div class="sub1">
                    <a href="#Sub1" id="subOne">Extinction</a>
                </div>
                <div class="sub2">
                    <a href="#Sub2" id="subTwo">Life Cycle</a>
                </div>
                <div class="sub3">
                    <a href="#Sub3" id="subThree">Species</a>
                </div>
                <div class="sub4">
                    <a href="#Sub4" id="subFour">Other1</a>
                </div>
            </div>
        </div>
        <div class="textPlus">
            <div class="article">
                <div class="artHead">
                    <div class="artHeadtxt">
                        <h1><?php echo $header;?></h1>
                        <p>Intro "At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat."</p>
                    </div>
                    <div class="artHeadimg">
                        <img src="images/placeholder.jpg">
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
                        <p>-Basketball was invented in 1891 by Dr. James Naismith. 
                        -He was a physical education teacher at a YMCA in Springfield, Massachusetts. 
                        -He came up with the game to keep his students occupied during the winter. 
                        -He nailed a peach basket to the gymnasium wall and the game was born. 
                        -The first game was played with a soccer ball and two teams of nine players. 
                        -The game was originally called “Naismith’s game” or “indoor baseball”. 
                        -Basketball quickly became popular and by 1893, there were already over 100 YMCA’s playing the game. 
                        -In 1896, the first professional basketball league was formed and in 1898, the first official college game was played. 
                        -The game has continued to grow in popularity and is now one of the most popular sports in the world.</p>
                    </div>
                </div>
                <br>
                <hr>
                <br>
                <div class="artSub2">
                    <div class="sub2txt">
                        <h3 id="Sub2">Sub2</h3>
                        <p>Sub2</p>
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
                        <h3 id="Sub3">sub3</h3>
                        <p>sub3</p>
                    </div>
                </div>
                <br>
                <hr>
                <br>
                <div class="artSub4">
                    <div class="sub4txt">
                        <h3 id="Sub4">sub4</h3>
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
