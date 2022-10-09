<?php
	$headerFile = file_get_contents("./pages/header.html", FILE_USE_INCLUDE_PATH);
	$footerFile = file_get_contents("./pages/footer.html", FILE_USE_INCLUDE_PATH);

    $files = glob($dir . 'pages/*.data');
    $file = array_rand($files);
    $recent = substr($files[$file], 6, strlen($files[$file])-strlen("pages/.data"));
    
    $file = file_get_contents($files[$file], FILE_USE_INCLUDE_PATH);
    $file = preg_split("/\r\n|\n|\r/", $file);
    $recentTitle = $file[2];


    

    $files = json_decode(file_get_contents('dict.json'), true);
    $popular = "";
    foreach ($files as $key => $value) {
        if ($popular == "") {
            $popular = $key;
        }
        else if ($value > $files[$key]) {
            $popular = $key;
        }
    }
    
    $file = file_get_contents($popular, FILE_USE_INCLUDE_PATH);
    $popular = substr($popular, 6, strlen($popular)-strlen("pages/.data"));
    $file = preg_split("/\r\n|\n|\r/", $file);
    $popularTitle = $file[2];
?>
<!DOCTYPE html>
<html>
    <head>
    <script>
        function auto_grow(element) {
            element.value = element.value.replace(/[\r\n]/gm, '');
            element.style.height = "5px";
            element.style.height = (element.scrollHeight)+"px";
        }
    </script>
    <script src="js/serach.js"></script>
	<title>Search<?php
		echo $headerFile; ?>
<!-- Set up template html code here-->
        <div class="one">
            <h1 id="title">Let your curiosity drive you!</h1>
            <div class="search">
                <div class="search-bar">
                    <div class="magnifind">
                        <img id="magnifind-img" src="images/magnigying-glass.png" alt="magnifind">
                    </div>
                    <div class="search-input">
                        <textarea id="search-element" placeholder="... what topic do you want to know about? (e.g. Dinosaur, Squirrel, Dihydrogen Monoxide)" oninput="auto_grow(this)"></textarea>
                        <script>runListener()</script>
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
                                <img src="images/placeholder.jpg">
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
                                <img src="images/placeholder.jpg">
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
            </div>
        </div>
        <?php echo $footerFile;?>
    </body>
</html>
