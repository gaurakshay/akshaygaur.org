<?php include './django-boilerplate-top.php';?>
            <h3>Update View</h3>
            <i>WIP</i>

<?php 
ob_start();
include "./django-boilerplate-bottom.php";
$boilerplate = ob_get_clean();
echo str_replace("???", "11", $boilerplate);
?>
