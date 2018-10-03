<?php

function app_nl2br($str, $forTextarea = false) {
    $output = '';
    
    if ($str) {
        $output = nl2br(htmlentities($str, ENT_QUOTES));

        if ($forTextarea) {
            $output = str_replace("<br />", "\n", $output);
        }
    }
    
    return $output;
}
