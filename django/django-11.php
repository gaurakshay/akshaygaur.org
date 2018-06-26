<?php 
ob_start();
include "./django-boilerplate-top.php";
$boilerplate = ob_get_clean();
echo str_replace("???", "UpdateView", $boilerplate);
?>
    <main>
    <h3>Update View</h3>
    <i>WIP</i>
    </main>
<?php 
ob_start();
include "./django-boilerplate-bottom.php";
$boilerplate = ob_get_clean();
echo str_replace("???", "11", $boilerplate);
?>
