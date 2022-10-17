<?php
	$headerFile = file_get_contents("./pages/header.html", FILE_USE_INCLUDE_PATH);
	$footerFile = file_get_contents("./pages/footer.html", FILE_USE_INCLUDE_PATH);
?>
<!DOCTYPE html>
<html  lang="en">
    <head>
	<title>Oh No!<?php
		echo $headerFile; ?>
        <div class="one">
            <div class="oh-no-page">
                <div class="no-page">
                    <div class="no-column">
                        <div class="no-title">
                            <div>
                                <h1>Oh No!</h1>
                            </div>
                        </div>
                        <img id="squirrel" src="/images/Logo 01- 600 x 600 px.png" alt="Navigation logo">
                    </div>
                    <div class="no-column">
                        <div class="no-box">
                            <p>
                                It looks like we’ve found a tough nut and can’t break into it. Maybe try to look for something else?
                            </p>
                        </div>
                        <img id="acorn" src="/images/Logo 02- 600 x 600 px.png">
                    </div>
                </div>
            </div>
        </div>
        <?php echo $footerFile;?>
    </body>
</html>
