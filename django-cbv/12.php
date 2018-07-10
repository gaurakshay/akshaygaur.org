<?php 
    // What is this file's name?
    $filename = basename(__FILE__, '.php');
    /* ========================================
                    HEADER
    =========================================*/
    ob_start();
    include_once("./pageTop.php");
    $boilerplate = ob_get_clean();
    echo str_replace("???", "DeleteView", $boilerplate);

    /* ========================================
                    CONTENT
    =========================================*/
    include_once("./$filename-content.html");

    /* ========================================
                    FOOTER
    =========================================*/
    ob_start();
    include_once("./pageBottom.php");
    $boilerplate = ob_get_clean();
    echo str_replace("???", "$filename", $boilerplate);
?>