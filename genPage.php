<?php
        $page = strtolower(htmlspecialchars($_GET["page"]));
        $command = escapeshellcmd('/var/www/html/genPage.sh "' . $page . '"');
        $output = shell_exec($command);
        echo $output;
        if (strpos($output, "Success") !== false || strpos($output, "Page exists") !== false) {
                $page = explode(": ", $output)[1];
                header('Location: https://deco3801-dinosandcometsequaldeath.uqcloud.net/Article.php?page=' . $page);
        } else {
                header('Location: https://deco3801-dinosandcometsequaldeath.uqcloud.net/OhNoPage.php');
        }
        exit();
