<?php
        $dict = [];
        $files = glob('pages/*.data');
        foreach ($files as &$file) {
                $dict[$file] = 0;
                echo $file . "\n";
        }
        file_put_contents("dict.json",json_encode($dict));
?>