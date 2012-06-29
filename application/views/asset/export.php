<?php

$file_name = strtolower(str_replace(" ","_",$title)) . ".csv";

//$output[] = implode("\n",array_keys($assets));
$output[] = implode(",", array_keys(get_object_vars($assets[0])));
foreach($assets as $asset) {
    $output[] = "\"" . implode("\",\"",get_object_vars($asset)) . "\"";
}


force_download($file_name,  implode("\n", $output));
