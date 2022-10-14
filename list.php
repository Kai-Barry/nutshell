<?php
$headerFile = file_get_contents("./pages/header.html", FILE_USE_INCLUDE_PATH);
$footerFile = file_get_contents("./pages/footer.html", FILE_USE_INCLUDE_PATH);
$files = glob('pages/*.data');
$page = 1;
if (isset($_GET["page"])) {
    $page = $_GET["page"];
}
$display = 20;
if (isset($_GET["display"])) {
    $display = $_GET["display"];
}
?>
<!DOCTYPE html>
<html>
    <head>
    <!--insert header code here-->
            <title>List<?php
                echo $headerFile; ?>
            <div class="wantMore" style="width:80% !important; float:left !important; margin-left:10% !important <?php // ; max-length:<?php echo (ceil(((count($files) - ($display * ($page - 1))) % 20) / 4) * 350) + 66;
            ?>">
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
                for ($i = (($page - 1) * $display); $i < ($page * $display) && $i < count($files); $i++) {
                    $file = $files[$i];
                    $fileData = file_get_contents($file, FILE_USE_INCLUDE_PATH);
                    $fileName = substr($file, 6, strlen($file)-strlen("pages/.data"));
                    $fileTitle = preg_split("/\r\n|\n|\r/", $fileData)[2];
                    $image = explode("\n", explode("\======/", $fileData)[2])[1];

                    echo '
                    <div style="float:left; width:25%; min-height:350px">
                        <a href="Article.php?page=' . $fileName . '">
                            <center class="relate">
                                <img style="width:80%"src="' . $image . '">
                                <h2>' . $fileTitle . '</h2>
                            </center>
                        </a>
                    </div>';
                }
                if ($page > 1) {
                    echo '<div class="pick-for-me" style="float:left"><a style="text-decoration:none"  href="/list.php?display=' . $display . '&page=' . ($page - 1) . '"><p>Previous Page</p></a></div>';
                }
                if ($page < $maxPage) {
                    echo '<div class="pick-for-me" style="float:right"><a style="text-decoration:none" href="/list.php?display=' . $display . '&page=' . ($page + 1) . '"><p>Next Page</p></a></div>';
                }
                ?>
                <div class="spacer"></div>
            </div>
        </div>
        <!--insert body code here-->
        <?php echo $footerFile;?>
    </body>
</html>