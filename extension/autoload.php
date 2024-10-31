<?php
/**
 * Created by PhpStorm.
 * User: michael.kirchner
 * Date: 21.03.18
 * Time: 17:19
 */

if ($handle = opendir(__DIR__)) {
    /* Das ist der korrekte Weg, ein Verzeichnis zu durchlaufen. */
    while (false !== ($entry = readdir($handle))) {
        if($entry != '.' && $entry != '..') {
            if(is_dir(__DIR__ . "/$entry") && is_file(__DIR__ . "/$entry/$entry.php")) {
                include __DIR__ . "/$entry/$entry.php";

                $extention = "\\de\\orcas\\wiki\\extension\\$entry";

                new $extention();
            }
        }
    }

    closedir($handle);
}