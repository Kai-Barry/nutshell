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
        <div class="translater-box">
            <textarea name="Summariser" placeholder ="Enter some text to be summarised." autocomplete="off" autocapitalize="off" crows="1" spellcheck="false"></textarea>
	    </div>
    </div>
    <?php echo $footerFile;?>
</body>
</html>