<?php
    $command = escapeshellcmd('pip install -r other\requirements.txt');
    $output = shell_exec($command);
    echo $output;
    exit();