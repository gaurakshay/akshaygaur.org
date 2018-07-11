    <!-- Footer Start -->
    <?php include '../footer.html';?>
  
    <!-- Footer End -->
    <?php
    // function get_stat($filename){
    //     $stat = stat($filename);
    //     // echo 'time: ' . $stat['mtime']; /* time of last modification (Unix timestamp) */
    //     // return 'size: ' . $stat['size'];  /* size in bytes */
    //     $info = array('size' => $stat['size'], 'time' => $stat['mtime']);
    //     // return $info;
    //     return json_encode($info);
    // }
    ?>
    <!-- ===============================JS ================================ -->
    <!-- <script src="../js/prism-okaidia.js"></script> -->
    <!-- <script src="../js/prism-treeview.js"></script> -->
    <!-- <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/highlight.min.js"></script> -->
    <!-- <script src="../js/highlightjs-line-numbers-min.js"></script> -->
    <script src="../js/highlight.pack.js"></script>
    <!-- <script src="../js/highlight-treeview.pack.js"></script> -->
    <script src="../js/highlightjs-line-numbers.js"></script>
    <script>hljs.initHighlightingOnLoad();</script>
    <script>hljs.initLineNumbersOnLoad();</script>
    <script src="../js/page-navigation.js"></script>
    <script src="../js/livereload.js"></script>
</body>
</html>