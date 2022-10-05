<?php
	$headerFile = file_get_contents("./pages/header.html", FILE_USE_INCLUDE_PATH);
	$footerFile = file_get_contents("./pages/footer.html", FILE_USE_INCLUDE_PATH);
?>
<!DOCTYPE html>
<html>
    <head>
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
                        <input id="search-element" type="text" placeholder="... what do you want to know?" onkeydown="myfunction(event)">
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
                        <div class="reco-box">
                            <img src="Images/placeholder.jpg">
                            <div class="box-page-title">
                                <p>title1</p>
                            </div>
                        </div>
                    </div>
                    <div class="reco-box-section">
                        <div class="box-title">
                            <p>Most viewed</p>
                        </div>
                        <div class="reco-box">
                            <img src="Images/placeholder.jpg">
                            <div class="box-page-title">
                                <p>title2</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pick-for-me">
                    <a href="random.php">
                        <p>Pick a topic for me</p>
                    </a>
                </div>
            </div>
        </div>
        <?php echo $footerFile;?>
    </body>
</html>
