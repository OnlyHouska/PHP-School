<?php

function readTimetable($file) {
    $json = file_get_contents( __DIR__ . '\\' . $file);
    $timetable = json_decode($json, true);
    echo implode($timetable);

}