<?php
    $headerFile = file_get_contents("./pages/header.html", FILE_USE_INCLUDE_PATH);
    $footerFile = file_get_contents("./pages/footer.html", FILE_USE_INCLUDE_PATH);
?>
<!DOCTYPE html>
<html  lang="en">
    <head>
    <!--insert header code here-->
        <title><!--Page title the php will append the site name after--><?php
        echo $headerFile; ?>
        <!--insert body code here-->
        <?php echo $footerFile;?>
    </body>
</html>
