<?php
        $dict = [];
        $files = glob('pages/*.data');
        foreach ($files as &$file) {
                $dict[$file] = 0;
                echo $file . "\n";
        }
        mkdir("stats");
        file_put_contents("stats/dict.json",json_encode($dict));
?>