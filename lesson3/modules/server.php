<?php

function Templater ($file, $params) {
    foreach ($params as $key => $value) {
        $$key = $value;
    }
    ob_start();
    include($file);
    return ob_get_clean();
}

