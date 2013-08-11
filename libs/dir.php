<?php

if ($gestor = opendir(__DIR__)) {
    while (false !== ($entrada = readdir($gestor))) {
        if ($entrada != "." && $entrada != "..") {
            if (is_dir($entrada)) {
                echo "$entrada/</br>";
            } else {
                echo "$entrada</br>";
            }
        }
    }
    closedir($gestor);
}
?>