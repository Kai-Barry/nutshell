<?php
	$headerFile = file_get_contents("./pages/header.html", FILE_USE_INCLUDE_PATH);
	$footerFile = file_get_contents("./pages/footer.html", FILE_USE_INCLUDE_PATH);
?>
<!DOCTYPE html>
<html>
    <head>
    <script>
        function auto_grow(element) {
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
                        <img id="magnifind-img" src="Images/magnigying-glass.png" alt="magnifind">
                    </div>
                    <div class="search-input">
                        <textarea id="search-element" placeholder="... what topic do you want to know about? (e.g. Dinosaur, Squirrel, Dihydrogen Monoxide)" onkeydown="myfunction(event)" oninput="auto_grow(this)"></textarea>
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
                        <a href="random.php">
                            <div class="reco-box">
                                <img src="Images/placeholder.jpg">
                                <div class="box-page-title">
                                    <p>title1</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="reco-box-section">
                        <div class="box-title">
                            <p>Most viewed</p>
                        </div>
                        <a href="random.php">
                            <div class="reco-box">
                                <img src="Images/placeholder.jpg">
                                <div class="box-page-title">
                                    <p>title2</p>
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
