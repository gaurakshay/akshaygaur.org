<?php

function get_max_index($dir)
{
    // Don't do anything if directory doesn't exist.
    if(!is_dir($dir)) {
        return false;
    }

    // Variable to hold the max index value.
    $max_index = 0;
    // Get all the files.
    // $files = array_diff(scandir($dir), array('.', '..'));
    $files = scandir($dir);
    // Loop through the files and find the max index number.
    foreach ($files as $file) {
        preg_match("/\d+/", $file, $index);
        // echo "File name : " . $file . "\t";
        // echo "Index : " . $index[0] . "<br>";
        if($index[0] > $max_index){
            $max_index = $index[0];
        }
    }
    unset($file);
    // echo 'Currently working in ' . $dir;
    return $max_index;
}

// If empty, get the root directory.
if(empty($_GET)){
    $max_index = get_max_index('../');
    echo $max_index;
} 
// If not empty, consider the directory relative to root directory.
elseif(!empty($_GET['dir'])) {
    $max_index = get_max_index('../' . $_GET['dir']);
    echo $max_index;
}

?>