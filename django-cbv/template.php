<?php include './pageTop.php';?>
    <main>

    </main>
<?php 
    ob_start();
    include "./pageBottom.php";
    $boilerplate = ob_get_clean();
    echo ($boilerplate);
?>
