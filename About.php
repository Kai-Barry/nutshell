<?php
    $headerFile = file_get_contents("./pages/header.html", FILE_USE_INCLUDE_PATH);
	$footerFile = file_get_contents("./pages/footer.html", FILE_USE_INCLUDE_PATH);
?>
<!DOCTYPE html>
<html>
    <head>
	<title>Ethics<?php
		echo $headerFile; ?>
        <div class="AboutTitle">
            <h1 id="title">About Us</h1>
        </div>
        <div class="AboutBox">
            <div class="AboutMessage">
                <h4>The In a Nutshell Team (🦖➕☄️=☠️) is a group of university students that are passionate about making online experiences simpler and accessible to everyone. Combining our unique perspectives and passions, we are a diverse team that seeks to create unique and engaging experiences through our different skill sets.  
                </h4>
                <h4>We’re just students who want to make the process of being a student easier for the next generation; we hope we’ve succeeded. 
                </h4>
                <div class="image">
                    <img id="nav-logo-1" src="images/Logo 01- 600 x 600 px.png" alt="Navigation logo">
                </div>
            </div>
        </div>
        <?php echo $footerFile;?>
    </body>
</html>