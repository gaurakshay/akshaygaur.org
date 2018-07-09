<?php 
    /* ========================================
                    HEADER
    =========================================*/
    ob_start();
    include_once("./pageTop.php");
    $boilerplate = ob_get_clean();
    echo str_replace("???", "UpdateView", $boilerplate);
?>
<?php 
    /* ========================================
                    CONTENT
    =========================================*/
    include_once("./11-content.html");
?>
<?php 
    /* ========================================
                    FOOTER
    =========================================*/
    ob_start();
    include_once("./pageBottom.php");
    $boilerplate = ob_get_clean();
    echo str_replace("???", "11", $boilerplate);
?>