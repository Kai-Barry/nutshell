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
                <h4>The In a Nutshell team are a group of somewhat smart..., innovative and all that jazz university students who seek to make young students’ exploration of the internet more friendly and approachable. woo!

                    Dedicated coders and designers. nice.
                    
                    lil shits
                    
                    questionably male dominant but we ignore that cause the woman has the position of power - not that they listen.
                    
                    We’re just students who want to make the process of being a student easier for the next generation. (that’s genuinely quite sweet look at me go)
                    
                    
                                ~ The In a Nutshell Team
                    </h4>
                <div class="image">
                    <img id="nav-logo-1" src="Images/Logo 01- 600 x 600 px.png" alt="Navigation logo">
                </div>
            </div>
        </div>
        <?php echo $footerFile;?>
    </body>
</html>