<?php
        $page = strtolower(htmlspecialchars($_GET["page"]));
        $command = escapeshellcmd('/var/www/html/genPage.sh "' . $page . '"');
        $output = shell_exec($command);
        echo $output;
        if (strpos($output, "Success") !== false || strpos($output, "Page exists") !== false) {
                $page = explode(": ", $output)[1];
                header('Location: /Article.php?page=' . $page);
        } else {
                header('Location: /OhNoPage.php');
        }
        exit();
