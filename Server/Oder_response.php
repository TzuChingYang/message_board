<?php
    session_start() ;
    $order = $_GET['order'] ;
    $_SESSION['order']=$order ;

    echo "<meta http-equiv=REFRESH CONTENT=0;url=TopicList_page.php?order=$order>";
?>