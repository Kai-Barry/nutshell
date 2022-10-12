<?php
	$headerFile = file_get_contents("./pages/header.html", FILE_USE_INCLUDE_PATH);
	$footerFile = file_get_contents("./pages/footer.html", FILE_USE_INCLUDE_PATH);

    $latest_ctime = 0;
    $recent = '';
    $files = glob('pages/*.data');
    foreach($files as $file)
    {
            if (is_file($file) && filectime($file) > $latest_ctime)
            {
                    $latest_ctime = filectime($file);
                    $recent = $file;
            }
    }


    $files = json_decode(file_get_contents('stats/dict.json'), true);
    $popular = "";
    foreach ($files as $key => $value) {
        if ($popular == "") {
            $popular = $key;
        }
        if ($value > $files[$popular]) {
            $popular = $key;
        }
    }

    $file = file_get_contents($recent, FILE_USE_INCLUDE_PATH);
    $recent = substr($recent, 6, strlen($recent)-strlen("pages/.data"));
    $recentTitle = preg_split("/\r\n|\n|\r/", $file)[2];
    $recentImage = explode("\n", explode("\======/", $file)[2])[1];

    $file = file_get_contents($popular, FILE_USE_INCLUDE_PATH);
    $popular = substr($popular, 6, strlen($popular)-strlen("pages/.data"));
    $popularTitle = preg_split("/\r\n|\n|\r/", $file)[2];
    $popularImage = explode("\n", explode("\======/", $file)[2])[1];
?>
<!DOCTYPE html>
<html>
    <head>
    <script>
        function auto_grow(element) {
            //element.value = element.value.replace(/[\r\n]/gm, '');
            if (element.value.includes("\n") || element.value.includes("\r")) {
                element.value = element.value.replace(/[\r\n]/gm, '');
                if (element.value.length > 0) {
                    window.location.href = "/genPage.php?page=" + element.value;
                }
            }
            element.style.height = "5px";
            element.style.height = (element.scrollHeight)+"px";
        }
    </script>
	<title>Search<?php
		echo $headerFile; ?>
<!-- Set up template html code here-->
        <div class="one">
            <h1 id="title">Let your curiosity drive you!</h1>
            <div class="search">
                <div class="search-bar">
                    <div class="magnifind">
                        <img id="magnifind-img" src="/images/magnigying-glass.png" alt="magnifind">
                    </div>
                    <div class="search-input">
                        <textarea id="search-element" placeholder="Discover something new! e.g. Dinosaur" oninput="auto_grow(this)"></textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="two">
            <div class="recommendation">
                <div class="reco-page">
                    <div class="reco-box-section">
                        <div class="box-title">
                            <p>Most recent</p>
                        </div>
                        <a href="Article.php?page=<?php echo $recent;?>">
                            <div class="reco-box">
                                <img src="<?php echo $recentImage;?>">
                                <div class="box-page-title">
                                    <p><?php echo $recentTitle;?></p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="reco-box-section">
                        <div class="box-title">
                            <p>Most viewed</p>
                        </div>
                        <a href="Article.php?page=<?php echo $popular;?>">
                            <div class="reco-box">
                                <img src="<?php echo $popularImage;?>">
                                <div class="box-page-title">
                                    <p><?php echo $popularTitle;?></p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <a href="random.php">
                    <div class="pick-for-me">
                        <p>Pick a topic for me</p>
                    </div>
                </a>
                <a href="list.php">
                    <div class="pick-for-me">
                        <p>View all topics</p>
                    </div>
                </a>
            </div>
        </div>
        <?php echo $footerFile;?>
    </body>
</html>
