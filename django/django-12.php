<?php 
    /* ========================================
                    HEADER
    =========================================*/
    ob_start();
    include_once("./django-boilerplate-top.php");
    $boilerplate = ob_get_clean();
    echo str_replace("???", "DeleteView", $boilerplate);
?>
<?php 
    /* ========================================
                    CONTENT
    =========================================*/
    include_once("./django-12-content.html");
?>
<?php 
    /* ========================================
                    FOOTER
    =========================================*/
    ob_start();
    include_once("./django-boilerplate-bottom.php");
    $boilerplate = ob_get_clean();
    echo str_replace("???", "12", $boilerplate);
?>