<?php
// TODO add a way to accept directory and generate md5 for it. So whenever anything inside the directory changes, files can be reloaded.
if($_GET["file"]){
    $filename = "../django/" . $_GET["file"];
    // echo($filename);
    $stat = stat($filename);
    $modTime = $stat['mtime'];
    // $info = array('size' => $stat['size'], 'time' => $stat['mtime']);
    // return $info;
    echo $modTime;
    // echo json_encode($info);
}

?>