<?php 
    /* ========================================
                    HEADER
    =========================================*/
    ob_start();
    include_once("./django-boilerplate-top.php");
    $boilerplate = ob_get_clean();
    echo str_replace("???", "CreateView", $boilerplate);
?>
<?php 
    /* ========================================
                    CONTENT
    =========================================*/
    include_once("./django-09-content.html");
 ?>
<?php 
    /* ========================================
                    FOOTER
    ========================================*/
    ob_start();
    include_once("./django-boilerplate-bottom.php");
    $boilerplate = ob_get_clean();
    echo str_replace("???", "09", $boilerplate);
?>