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
            <div class="search">
                <img src="Images/logo-2.png" alt="logo">
                <div class="search-bar">
                    <div class="magnifind">
                        <img id="magnifind-img" src="Images/magnigying-glass.png" alt="magnifind">
                    </div>
                    <div class="search-input">
                        <input id="search-element" type="text" placeholder="Search.." onkeydown="myfunction(event)">
                        <script>runListener()</script>
                    </div>
                </div>
            </div>
        </div> 
        <div class="two">
            <p>results</p>
            <p id="demo"></p>
        </div>
        <?php echo $footerFile;?>
    </body>
</html>
