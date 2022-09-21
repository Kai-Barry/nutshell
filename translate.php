<?php
	$headerFile = file_get_contents("./pages/header.html", FILE_USE_INCLUDE_PATH);
	$footerFile = file_get_contents("./pages/footer.html", FILE_USE_INCLUDE_PATH);
?>
<!DOCTYPE html>
<html>
    <head>
	<title>Summariser<?php
		echo $headerFile; ?>
<!-- Set up template html code here-->
    <div class="one">
        <div class="title">
            <div>
                <h1>Summariser</h1>
            </div>
            <div>
                <p>Need help understanding a paragraph you've found?</p>
            </div>
        </div>
        <div class="translater-box">
            <textarea name="Summariser" placeholder ="Enter any paragraph that you want summarised here..." autocomplete="off" autocapitalize="off" crows="1" spellcheck="false"></textarea>
        </div>
        <div class="summarise-button-box">
            <div class="summarise-button">
                <p>Summarise!</p>
            </div>
        </div>
    </div>
    <?php echo $footerFile;?>
</body>
</html>