<?php
        //Find newest save not from today
        $latest_ctime = 0;
        $recent = '';
        $files = glob('stats/currVisits*.json');
        foreach($files as $file) {
                if (is_file($file) && filectime($file) > $latest_ctime
                        && $file != "stats/currVisits-" . date("Y-m-d") . ".json") {
                        $latest_ctime = filectime($file);
                        $recent = $file;
                }
        }
        //Compare files
        $oldDictName = $recent;
        $currDictName = "stats/dict.json";
        //Generate results if first time running
        if ($oldDictName != '') {
                $oldDict = json_decode(file_get_contents($oldDictName), true);
        } else {
                $oldDict = [];
        }

        
        $files = glob('pages/*.data');
        foreach ($files as &$file) {
                $dict[$file] = 0;
                echo $file . "\n";
        }
        $currDict = json_decode(file_get_contents($currDictName), true);
        //Prune removed pages
        foreach ($currDict as $key => $value) {
                if (!in_array($key,  $files)) {
                        unset($currDict[$key]);
                        if (array_key_exists($key, $oldDict)) {
                                unset($oldDict[$key]);
                        }
                }
        }
        file_put_contents($currDictName,json_encode($currDict));
        //Generate difference of files
        foreach ($oldDict as $key => $value) {
                $currDict[$key] -= $oldDict[$key];
                if ($currDict[$key] < 1) {
                        unset($currDict[$key]);
                }
        }
        $pages = [];
        //Find new pages
        foreach ($currDict as $key => $value) {
                if (!array_key_exists($key,  $oldDict)) {
                        $pages[] = $key;
                }
        }
        copy($currDictName, "stats/currVisits-" . date("Y-m-d") . ".json");
        file_put_contents("stats/newVisits-" . date("Y-m-d") . ".json",json_encode($currDict));
        file_put_contents("stats/newPages-" . date("Y-m-d") . ".json",json_encode($pages));
?>
