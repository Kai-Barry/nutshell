<?php
    $command = escapeshellcmd('pip install -r requirements.txt');
    $output = shell_exec($command);
    echo $output;
    exit()