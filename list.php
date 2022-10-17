<?php
$headerFile = file_get_contents("./pages/header.html", FILE_USE_INCLUDE_PATH);
$footerFile = file_get_contents("./pages/footer.html", FILE_USE_INCLUDE_PATH);
$files = glob('pages/*.data');
$page = 1;
if (isset($_GET["page"])) {
    $page = htmlspecialchars($_GET["page"]);
}
$display = 20;
if (isset($_GET["display"])) {
    $display = htmlspecialchars($_GET["display"]);
}
?>
<!DOCTYPE html>
<html  lang="en">
    <head>
    <!--insert header code here-->
            <title>List<?php
                echo $headerFile; ?>
            <div class="wantMore" style="width:80% !important; float:left !important; margin-left:10% !important>">
                <h2>Below are all our pages:</h2>
                <?php
                echo '<h2 style="text-align:center"><';
                $endSpacing = 2;
                $middleSpacing = 2;
                $maxPage = ceil(count($files) / $display);
                if ($maxPage > 1) {
                    $maxReached = 0;
                    for ($i = 1; $i < $maxPage && $i <= $endSpacing + 1; $i++) {
                        if ($page == $i) {
                            echo $i . ' ';
                        } else {
                            echo '<a href="/list.php?display=' . $display . '&page=' . $i . '">' . $i . '</a> ';
                        }
                        $maxReached = $i;
                    }
                    if ($page > $endSpacing + $middleSpacing + 2) {
                        echo "... ";
                    }
                    for ($i = $page - $middleSpacing; $i < $maxPage && $i <= $page + $middleSpacing; $i++) {
                        if ($maxReached >= $i) {
                            continue;
                        }
                        if ($page == $i) {
                            echo $i . ' ';
                        } else {
                            echo '<a href="/list.php?display=' . $display . '&page=' . $i . '">' . $i . '</a> ';
                        }
                        $maxReached = $i;
                    }
                    if ($page < $maxPage - ($endSpacing + $middleSpacing + 1)) {
                        echo "... ";
                    }
                    for ($i = $maxPage - $endSpacing; $i < $maxPage; $i++) {
                        if ($maxReached >= $i) {
                            continue;
                        }
                        if ($page == $i) {
                            echo $i . ' ';
                        } else {
                            echo '<a href="/list.php?display=' . $display . '&page=' . $i . '">' . $i . '</a> ';
                        }
                        $maxReached = $i;
                    }
                    if ($page == $maxPage) {
                        echo $maxPage;
                    } else {
                        echo '<a href="/list.php?display=' . $display . '&page=' . $maxPage . '">' . $maxPage . '</a>';
                    }
                    echo '></h2>';
                }?>
                <h2>
                        Display <a href="/list.php?display=4">4</a>
                        <a href="/list.php?display=12">12</a>
                        <a href="/list.php?display=20">20</a>
                        <a href="/list.php?display=40">40</a>
                        <a href="/list.php?display=100">100</a> pages at once.
                </h2>
                <?php
                $i = 0;
                for ($index = (($page - 1) * $display);
                    $index < ($page * $display) && $index < count($files);
                    $index++) {
                    $file = $files[$index];
                    $fileData = file_get_contents($file, FILE_USE_INCLUDE_PATH);
                    $fileName = substr($file, 6, strlen($file)-strlen("pages/.data"));
                    $fileTitle = preg_split("/\r\n|\n|\r/", $fileData)[2];
                    $image = explode("\n", explode("\======/", $fileData)[2])[1];
                    
                    $direction = "right";
                    if ($i % 4 == 0) {
                        $direction = "left";
                        echo '<div class="spacer">';
                    }
                    if ($i % 2 == 0) {
                        echo '<div class="spacer" style=" width:50%; clear: none; float:' . $direction . '">';
                    }
                    echo '
                    <div style="float:left; width:50%;">
                        <a href="Article.php?page=' . $fileName . '">
                            <div class="relate" >
                                <img style="width:80%; margin-left:10%; margin-right:10%" src="' . $image . '">
                                <h2>' . $fileTitle . '</h2>
                            </div>
                        </a>
                    </div>';
                    if ($i % 2 == 1) {
                        echo '</div>';
                    }
                    if ($i % 4 == 3) {
                        echo '</div>';
                    }
                    $i += 1;
                }
                if ($i % 2 != 0) {
                    echo '</div>';
                }
                if ($i % 4 != 0) {
                    echo '</div>';
                }
                echo '<div class="spacer"></div>';
                if ($page > 1) {
                    echo '<a style="text-decoration:none"  href="/list.php?display='
                        . $display . '&page=' . ($page - 1)
                        . '"><div class="pick-for-me" style="float:left"><p>Previous Page</p></div></a>';
                }
                if ($page < $maxPage) {
                    echo '<a style="text-decoration:none" href="/list.php?display='
                        . $display . '&page=' . ($page + 1)
                        . '"><div class="pick-for-me" style="float:right"><p>Next Page</p></div></a>';
                }
                ?>
                <div class="spacer"></div>
            </div>
        </div>
        <!--insert body code here-->
        <?php echo $footerFile;?>
    </body>
</html>
