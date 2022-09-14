<?php
	$headerFile = file_get_contents("./pages/header.html", FILE_USE_INCLUDE_PATH);
	$footerFile = file_get_contents("./pages/footer.html", FILE_USE_INCLUDE_PATH);
?>
<!DOCTYPE html>
<html>
    <head>
	<title>Search<?php
		echo $headerFile; ?>
<!-- Set up template html code here-->
        <div class="one">
            <!-- <img id="placeholder-background" src="images/placeholder.jpg" alt="Navigation logo"> -->
            <div class="search">
                <img src="images/logo-2.png" alt="logo">
                <div class="search-bar">
                    <div class="magnifind">
                        <img id="magnifind-img" src="images/magnigying-glass.png" alt="magnifind">
                    </div>
                    <div class="search-input">
                        <form id="search" action="#">
                            <input type="text" placeholder="Search.." onkeydown="myfunction(event)">
                        </form>
                        <script>
                            function handle(e){
                                if(e.key === "Enter"){
                                    alert("Enter was just pressed.");
                                }
                        
                                return false;
                            }
                        </script>
                    </div>
                </div>
            </div>
        </div> 
        <div class="two">
            <p>results</p>
            <p id="demo"></p>
        </div>
        <script>
            function myFunction(event) {
              var x = event.key;
              document.getElementById("demo").innerHTML = "The pressed key was: " + x;
            }
        </script>
    </body>
</html>
