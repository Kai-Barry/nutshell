<?php
$headerFile = file_get_contents("./pages/header.html", FILE_USE_INCLUDE_PATH);
$footerFile = file_get_contents("./pages/footer.html", FILE_USE_INCLUDE_PATH);
?>
<!DOCTYPE html>
<html>
    <head>
    <!--insert header code here-->
            <title>List<?php
                echo $headerFile; ?>
            <div class="wantMore" style="width:80%; float:left; margin-left:10%">
                <h2>Below are all our pages:</h2>
                <?php
                $files = glob('pages/*.data');
                foreach ($files as &$file) {
                    $fileData = file_get_contents($file, FILE_USE_INCLUDE_PATH);
                    $fileName = substr($file, 6, strlen($file)-strlen("pages/.data"));
                    $fileTitle = preg_split("/\r\n|\n|\r/", $fileData)[2];
                    $image = explode("\n", explode("\======/", $fileData)[2])[1];

                    echo '
                    <div style="float:left; width:25%; height=200px">
                        <a href="Article.php?page=' . $fileName . '">
                            <center class="relate">
                                <img style="width:80%"src="' . $image . '">
                                <h2>' . $fileTitle . '</h2>
                            </center>
                        </a>
                    </div>';
                }
                ?>
            </div>
        </div>
        <!--insert body code here-->
        <?php echo $footerFile;?>
    </body>
</html>