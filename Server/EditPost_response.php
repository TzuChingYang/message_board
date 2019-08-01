<?php // Basic setting
session_start() ;
$order = $_SESSION['order'] ;


// Get Post Data
$belongs = $_SESSION['Username'] ;
$topic_posttime =$_SESSION['posttime'] ;

$old_title=$_SESSION['topic'];
$old_content=$_SESSION['content'];

$title = $_POST['title'];
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
if(empty($title) || empty($content)){
    if (empty($title)==true && empty($content)==true){
        echo 'Error : your post\'s should not be empty !<br> ';
        echo "<meta http-equiv=REFRESH CONTENT=3;url=EditPost_page.php>";

    }else if(empty($title)==true){
        echo 'Error : your post\'s title should not be empty !<br> ';
        echo '<meta http-equiv=REFRESH CONTENT=3;url=EditPost_page.php>';

    }else{
        echo 'Error : your post\'s content should not be empty !<br> ';
        echo '<meta http-equiv=REFRESH CONTENT=3;url=EditPost_page.php>';


    }
}else{
    $sql = "Update Topic set Topic='$title',Content='$content',PostTime=NOW() WHERE (Topic='$old_title'&&Content='$old_content')" ;
    $query = $conn->query($sql) ;

    // Check success or not
    if ($query){
        $sql_reply_topic = "Update Reply set Topic='$title' Where Topic='$old_title'" ;
        $query =$conn->query($sql_reply_topic) ;

        echo "<meta http-equiv=REFRESH CONTENT=0;url=TopicList_page.php?order=$order>";


    }else{

        echo 'Your Article Edit fails !! Please try again<br>' ;
        echo 'Page will return in 5 seconds...<br>' ;
        echo "<meta http-equiv=REFRESH CONTENT=5;url=EditPost.php>";

    }
}

?>





<!DOCTYPE html>
<html>

<head>

</head>

<body>

</body>

</html>
