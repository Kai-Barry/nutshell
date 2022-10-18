<?php
    $files = glob('pages/*.data');
    $file = array_rand($files);
    header('Location: /Article.php?page='
        . substr($files[$file], 6, strlen($files[$file])-strlen("pages/.data")));
    exit();
