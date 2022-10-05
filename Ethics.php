<?php
    $headerFile = file_get_contents("./pages/header.html", FILE_USE_INCLUDE_PATH);
	$footerFile = file_get_contents("./pages/footer.html", FILE_USE_INCLUDE_PATH);
?>
<!DOCTYPE html>
<html>
    <head>
	<title>Ethics<?php
		echo $headerFile; ?>
        <div class="EthosTitle">
            <h1 id="title">Our Ethos</h1>
        </div>
        <div class="EthicsTitle">
            <h1 id="title">About Us</h1>
        </div>
        <div class="EthicsBox">
            <div class="EthicsMessage">
                <h4>Lemme tell you something.

                    AI - questionable choice. BUT we have proof that it is ethical (do we? uh... do we need to do research?)
                    
                    
                    might need to discuss the ethics of it being an education tool for students - risks and how to mitigate risks. (ESSENTIALLY it will be our ethics section from our report)
                    
                    but it’s fine because we have a cute lil squirrel mascot, who could hate a squirrel. Especially, a squirrel named Finn (Finny).
                </h4>
                <div class="image">
                    <img id="nav-logo-1" src="images/Logo 01- 600 x 600 px.png" alt="Navigation logo">
                </div>
            </div>
        </div>
        <?php echo $footerFile;?>
    </body>
</html>
