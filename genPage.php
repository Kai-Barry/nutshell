<?php
        $page = $_GET["page"];
        $command = escapeshellcmd('/var/www/html/genPage.sh "' . $page . '"');
        //echo $command;
        $output = shell_exec($command);
        echo $output;
        if (strpos($output, "Success") !== false || strpos($output, "Page exists") !== false) {
                //echo "passed";
                $page = explode(": ", $output)[1];
                /*if (strpos($output, "Success") !== false) {
                        $files = json_decode(file_get_contents('stats/dict.json'), true);
                        $files["pages/" . $page  . ".data"] = 0;
                        file_put_contents("/stats/dict.json",json_encode($files));
                }*/
                header('Location: https://deco3801-dinosandcometsequaldeath.uqcloud.net/Article.php?page=' . $page);
        }
        else {
                header('Location: https://deco3801-dinosandcometsequaldeath.uqcloud.net/OhNoPage.php');
        }
        exit();
?>