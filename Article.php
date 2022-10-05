<?php
	$headerFile = file_get_contents("./pages/header.html", FILE_USE_INCLUDE_PATH);
	$footerFile = file_get_contents("./pages/footer.html", FILE_USE_INCLUDE_PATH);
?>
<!DOCTYPE html>
<html>
    <head>
    <!--insert header code here-->
	    <title>Article<?php
		echo $headerFile; ?>
        <div class="jumptomenu">
            <div class="jumpto">
                <div class="sub1">
                    <a href="#Sub1" id="subOne">Extinction</a>
                </div>
                <div class="sub2">
                    <a href="#Sub2" id="subTwo">Life Cycle</a>
                </div>
                <div class="sub3">
                    <a href="#Sub3" id="subThree">Species</a>
                </div>
                <div class="sub4">
                    <a href="#Sub4" id="subFour">Other1</a>
                </div>
            </div>
        </div>
        <!--insert body code here-->
        <?php echo $footerFile;?>
    </body>
</html>
