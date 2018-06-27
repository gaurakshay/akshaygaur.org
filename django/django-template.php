<?php include './django-boilerplate-top.php';?>
    <main>

    </main>
<?php 
    ob_start();
    include "./django-boilerplate-bottom.php";
    $boilerplate = ob_get_clean();
    echo ($boilerplate);
?>
