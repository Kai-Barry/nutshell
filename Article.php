<?php
$page = strtolower(htmlspecialchars($_GET["page"]));
if (!file_exists("/var/www/html/pages/" . $page  . ".data")) {
        echo "error: /var/www/html/pages/" . $page  . ".data";
        header('Location: https://deco3801-dinosandcometsequaldeath.uqcloud.net/genPage.php?page=' . $page);
        exit();
}
$headerFile = file_get_contents("./pages/header.html", FILE_USE_INCLUDE_PATH);
$footerFile = file_get_contents("./pages/footer.html", FILE_USE_INCLUDE_PATH);
$file = file_get_contents("./pages/" . $page  . ".data", FILE_USE_INCLUDE_PATH);
$data = explode("\======/", $file);
foreach ($data as &$value) {
        $value = preg_split("/\r\n|\n|\r/", $value);
        $i = 0;
        foreach ($value as &$line) {
                if ($line[0] == '#') {
                        unset($value[$i]);
                }
                else if (substr($line, 0, 3) == '***') {
                        $value[$i] =substr($value[$i], 3);
                }
                $i++;
        }
        $value = array_filter(array_values($value));
}
unset($value);
$title = $data[0][0];
$header = $data[0][1];
$body = $data[1];
$images = $data[2];

//Seperate body into paragraph and topics
$paras = [];
$breakpoint = 0;
$para = "";
for ($x = 0; $x <= 5; $x++) {
        $count = 0;
        foreach ($body as &$line) {
            $count = $count + 1;
            if ($count <= $breakpoint) {
                continue;
            }
            else if ($line === "\=====/") {
                $breakpoint = $count;
                break;
            }
            $para = $para . $line . "\n";
        }
        unset($line);
        $paras[] = $para;
        unset($para);
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


$files = json_decode(file_get_contents('stats/dict.json'), true);
$files["pages/" . $page  . ".data"] += 1;
file_put_contents("stats/dict.json",json_encode($files));
?>
<!DOCTYPE html>
<html  lang="en">
    <head>
    <!--insert header code here-->
        <title><?php
                echo $title;
                echo $headerFile; ?>
        <div class="jumptomenu">
            <div class="jumpto">
                <a href="#Sub1" id="subOne">
                    <div class="sub" style="background-color:#C9864E">
                        <?php echo $headings[2];?>
                    </div>
                </a>
                <a href="#Sub2" id="subTwo">
                    <div class="sub" style="background-color:#875930">
                        <?php echo $headings[3];?>
                    </div>
                </a>
                <a href="#Sub3" id="subThree">
                    <div class="sub" style="background-color:#6F442A">
                        <?php echo $headings[4];?>
                    </div>
                </a>
                <a href="#Sub4" id="subFour">
                    <div class="sub" style="background-color:#5D3525">
                    <?php echo $headings[5];?></a>
                    </div>
                </a>
            </div>
        </div>
        <div class="textPlus">
            <div class="article">
                <div class="articleContainer">
                    <h1><?php echo $header;?></h1>
                    <img style="float:right" src='<?php echo $images[1]?>'>
                    <p><?php echo $paragraphs[1];?></p>
                </div>
                <hr>
                <div class="articleContainer">
                    <h3 style="float:right" id="Sub1"><?php echo $headings[2];?></h3>
                    <img src="<?php echo $images[2]?>">
                    <p style="float:right"><?php echo $paragraphs[2];?></p>
                </div>
                <hr>
                <div class="articleContainer">
                    <h3 id="Sub2"><?php echo $headings[3];?></h3>
                    <img style="float:right" src="<?php echo $images[3]?>">
                    <p><?php echo $paragraphs[3];?></p>
                </div>
                <hr>
                <div class="articleContainer">
                    <h3 style="float:right" id="Sub3"><?php echo $headings[4];?></h3>
                    <img src="<?php echo $images[4]?>">
                    <p style="float:right"><?php echo $paragraphs[4];?></p>
                </div>
                <hr>
                <div class="articleContainer">
                    <h3 id="Sub4"><?php echo $headings[5];?></h3>
                    <img style="float:right" src="<?php echo $images[5]?>">
                    <p><?php echo $paragraphs[5];?></p>
                </div>
                <div class="spacer"></div>
            </div>
            <div class="wantMore">
                <h2>Want More?</h2>
                <div class="moreArt">
                    <?php
                    
                    $files = glob('pages/*.data');
                    $target = count($files);
                    if ($target > 8) {
                        $target = 8;
                    }
                    $display = [];
                    if ($target < 8) {
                        $display = range(0, $target - 1);
                    }
                    while (count($display) < $target) {
                        $file = array_rand($files);
                        if (!in_array($file, $display)) {
                            $display[] = $file;
                        }
                    }

                    $i = 0;
                    foreach ($display as &$subject) {
                        $fileData = file_get_contents($files[$subject], FILE_USE_INCLUDE_PATH);
                        $fileName = substr($files[$subject], 6, strlen($files[$subject])-strlen("pages/.data"));
                        $fileTitle = preg_split("/\r\n|\n|\r/", $fileData)[2];
                        $image = explode("\n", explode("\======/", $fileData)[2])[1];

                        if ($i % 2 == 0) {
                            echo '<div class="spacer">';
                        }
                        echo '
                        <a href="Article.php?page=' . $fileName . '">
                            <div class="relate" style="margin-left:auto; margin-right:auto">
                                <img src="' . $image . '">
                                <h2>' . $fileTitle . '</h2>
                            </div>
                        </a>';
                        if ($i % 2 == 1) {
                            echo '</div>';
                        }
                        $i += 1;
                    }
                    if ($i % 2 == 1) {
                        echo '</div>';
                    }
                    ?>
                    <div class="spacer"></div>
                </div>
            </div>
            </div>
        <div class="spacer"></div>
        <!--insert body code here-->
        <?php echo $footerFile;?>
    </body>
</html>
