<?php 
    /* ========================================
                    HEADER
    =========================================*/
    ob_start();
    include_once("./pageTop.php");
    $boilerplate = ob_get_clean();
    echo str_replace("???", "Templates", $boilerplate);
?>
<?php 
    /* ========================================
                    CONTENT
    =========================================*/
    include_once("./10-content.html");
?>
<?php 
    /* ========================================
                    FOOTER
    =========================================*/
    ob_start();
    include_once("./pageBottom.php");
    $boilerplate = ob_get_clean();
    echo str_replace("???", "10", $boilerplate);
?>