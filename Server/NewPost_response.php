<?php // Basic setting
    session_start() ;
    $order = $_SESSION['order'] ;


// Get Post Data
    $belongs = $_SESSION['Username'] ;
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
            echo "<meta http-equiv=REFRESH CONTENT=3;url=NewPost_page.php>";

        }else if(empty($title)==true){
            echo 'Error : your post\'s title should not be empty !<br> ';
            echo '<meta http-equiv=REFRESH CONTENT=3;url=NewPost_page.php>';

        }else{
            echo 'Error : your post\'s content should not be empty !<br> ';
            echo '<meta http-equiv=REFRESH CONTENT=3;url=NewPost_page.php>';


        }
    }else{
        $sql = "Insert into Topic(Topic,Content,Belongs) values ('$title','$content','$belongs')" ;
        $query = $conn->query($sql) ;

        // Check success or not
        if ($query){
            echo "<meta http-equiv=REFRESH CONTENT=0;url=TopicList_page.php?order=$order>";


        }else{

            echo 'Your Article Post fails !! Please try again<br>' ;
            echo 'Page will return in 5 seconds...<br>' ;
            echo "<meta http-equiv=REFRESH CONTENT=5;url=NewPost_page.php>";

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
