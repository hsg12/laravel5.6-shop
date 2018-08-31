<?php
function getYear() {
    $year = date('Y');
    return $year > 2018 ? "2018 - $year" : $year;
}
