<?php
    $headerFile = file_get_contents("./pages/header.html", FILE_USE_INCLUDE_PATH);
	$footerFile = file_get_contents("./pages/footer.html", FILE_USE_INCLUDE_PATH);
?>
<!DOCTYPE html>
<html>
    <head>
	<title>Ethos<?php
		echo $headerFile; ?>
        <div class="EthosTitle">
            <h1 id="title">Our Ethos</h1>
        </div>
        <div class="EthosBox">
            <div class="EthosMessage">
                <h4>At In a Nutshell, we are determined to provide a simpler way for students to drive their curiosity and find answers to their questions in a simple manner. We aim to be a place for students to expand their knowledge and search for answers to their ‘why’ and ‘what’. 

                    In a Nutshell strives to provide accurate and sensible content for all students. Through our AI system, we strive to provide a place for students to properly understand content that otherwise would be incomprehensible on other platforms. 
                    
                    more bs about our ethos, laura is working on it. 
                    
                    
                    I doubt there’ll be anything else here other than text. you’re welcome :)
                </h4>
                <div class="image">
                    <img id="nav-logo-1" src="Images/Logo 01- 600 x 600 px.png" alt="Navigation logo">
                </div>
            </div>
        </div>
        <?php echo $footerFile;?>
    </body>
</html>
