<?php // Basic setting
session_start() ;
$order = $_SESSION['order'] ;

// Get Post Data
$username= $_SESSION['Username'] ;

$topic = $_SESSION['topic'] ;
$topic_belongs =$_SESSION['belongs'];
$topic_posttime =$_SESSION['posttime'];

$content =$_POST['content'] ;

// Data base connect
$server = 'localhost' ;
$db_username = 'tzching' ;
$db_password = '00000000' ;
$db_name ='MessageBoard' ;

$conn = new mysqli($server,$db_username,$db_password,$db_name) ;

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}else{
    //echo 'Connect and check your post ... <br><br>' ;
}

// Check title and title is empty or not
if(empty($content)){
    echo 'Delete Success !<br> ';
    $sql = "Delete from Reply WHERE (Topic='$topic'&&Belongs='$username')" ;
    $query=$conn->query($sql);

    $sql_select = "Select * from Topic Where (Topic='$topic'&&PostTime='$topic_posttime')";
    $query_select =$conn->query($sql_select) ;
    $row = $query_select->fetch_assoc();

    $new_num_reply= $row['Num_Reply']-1 ;

    $sql_update="Update Topic set Num_Reply='$new_num_reply' WHERE (Topic='$topic'&&PostTime='$topic_posttime') ";
    $query= $conn->query($sql_update);
    
    echo '<meta http-equiv=REFRESH CONTENT=3;url=TopicList_page.php>';

}else{
    $sql = "Delete from Reply WHERE (Topic='$topic'&&Belongs='$username')" ;
    $query = $conn->query($sql) ;

    // Check success or not
    if ($query){

        // Insert
        $sql = "Insert into Reply(Topic,Content,Belongs) values ('$topic','$content','$username')" ;
        $query = $conn->query($sql) ;

        ?>
        <body>
        <meta http-equiv=REFRESH CONTENT=0;url="<?php echo"PostAndReply_page.php?belongs=$topic_belongs&posttime=$topic_posttime"?>">
        </body>

        <?php
    }else{
        echo $topic.'<br>';
        echo $username.'<br>';
        echo 'Your Article Post fails !! Please try again<br>' ;
        echo 'Page will return in 5 seconds...<br>' ;
        echo "<meta http-equiv=REFRESH CONTENT=5;url=Reply_page.php>";

    }
}

?>

