<?php
    session_start() ;
    $order =$_SESSION['order'];
    $username = $_SESSION['Username'] ;
    $belongs =$_GET['belongs'] ;


    if(empty($_SESSION['posttime'])){
        $posttime=$_GET['posttime'];
        $_SESSION['posttime']=$posttime;

    }else{
        $posttime=$_SESSION['posttime'] ;
    }

    // Move belong and posttime to session
    $_SESSION['belongs']=$belongs;

    /* ========================================= */
    // Connect to data base
    // SQL Topic table to get data of Post...
    /* ========================================= */
    // Get Connection

    // Data base connect
    $server = 'localhost' ;
    $db_username = 'tzching' ;
    $db_password = '00000000' ;
    $db_name ='MessageBoard' ;

    $conn = new mysqli($server,$db_username,$db_password,$db_name) ;

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // SQL start:
    $sql="Select * from Topic where (Belongs='$belongs'&&PostTime='$posttime')";
    $query = $conn->query($sql) ;
    $row =$query->fetch_assoc() ;

    $topic = $row['Topic'];
    $content =$row['Content'] ;

    $_SESSION['topic']=$topic ;
    $_SESSION['content']=$content ;


echo 'belongs: '.$belongs .'<br>' ;
    echo 'posttime: '.$posttime .'<br> <hr>' ;
    echo 'topic: '.$topic.'<br>' ;
    echo 'content: '.$content.'<br>' ;
    ?>

<!DOCTYPE html>
<html>

<head>
    <title> <?php echo $topic ?></title>

    <style>
        #menu {
            position: fixed;
            left: 0;
            top: 50%;
            width: 8em;
            margin-top: -2.5em;
        }
        #body{
            margin:0px;
            padding:0px;
            background:#000000 url(img_resource/background_love.png) center center fixed no-repeat;　//設定背景圖片的呈現方式
            background-size:contain;　//設定背景圖片的填滿方式
        }

        body{
            font: 12px Arial,Tahoma,Helvetica,FreeSans,sans-serif;
            text-transform: inherit;
            color: #333;
            background: #e7edee;
            width: 100%;
        }

        table {
            border:1px solid #000;
            font-family: 微軟正黑體;
            font-size:16px;
            width:600px;
            border:0px solid #000;
            text-align:center;
            border-collapse:collapse;
        }
        th {
            padding: 5px;
            border:0px solid #000;
            color:#fff;
        }
        td {
            border:0px solid #000;
            padding:1px;
        }
        .wrap{
            width: 720px;
            height: 450px;
            margin: 15px auto;
            padding: 15px 10px;
            background: white;
            border: 2px solid #DBDBDB;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            border-radius: 5px;
        }

        .wrap_reply{
            width: 600px;
            height: 150px;
            margin: 15px auto;
            padding: 5px 5px;
            background: white;
            border: 2px solid #DBDBDB;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            border-radius: 5px;
        }

        .wrap_content{
            width: 680px;
            height: 200px;
            margin: 15px auto;
            padding: 15px 10px;
            background: white;
            border: 2px solid #DBDBDB;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;

        }

        .input_submit{
            padding:5px 15px; background:lightsalmon; border:0 none;
            cursor:pointer;
            -webkit-border-radius: 5px;
            border-radius: 5px;
        }

        .title, .userName {
            font-weight:700;
        }

        .post {
            border-bottom: 1px solid black;
            padding-bottom: 5px;
        }

        .post .title{
            font-style:italic;
        }
        .post .body{
            margin-top:5px;
        }

    </style>
</head>


<body id="body">

<ul id=menu >
    <?php echo "<li><a href=TopicList_page.php?order=$order style='font-size: 25px;color:red;'><b>MessageBoard</b></a> "?>
    <li><a href="NewPost_page.php" style="font-size: 25px;color:red;"><b>NewPost</b></a>
    <li><a href="Reply_page.php" style="font-size: 25px;color:red;"><b>Reply</b></a></li>
    <li><a href="Login_page.php" style="font-size: 25px;color:red;"><b>Logout</b></a>

</ul>

<div class="wrap" style="background-color: lemonchiffon" >
    <div >
        <h1 class="title" style="color: rebeccapurple; text-align: center ; font-size: 30px;word-wrap: break-word"><?php echo $topic ; ?>
            <?php
            if ($username == $belongs) {
                echo '<a href="EditPost_page.php"><img src="img_resource/img_modify.png"></h1> </a>';
            }
            ?>

        <h2 style="color: rebeccapurple; text-align: right" > <?php echo $belongs; ?> </h2>
        <h2 style="color: #626263; text-align: right" > <?php echo substr($posttime,0,19); ?> <hr></h2>
        <div >
            <div>
                <h2 style="color: rebeccapurple; font-size: 20px">Content:</h2>
                    <div class="wrap_content">
                        <?php echo '<h2 style="color: rebeccapurple;word-wrap: break-word">'.$content.'</h2>' ;?>
                    </div>
            </div>
        </div>
    </div>
</div>

<!-- Here start to catch reply's data -->
<?php
    $sql_select_reply = "Select * from Reply Where Topic='$topic'" ;
    $query_reply = $conn->query($sql_select_reply);

    for ($num=0;$num < $query_reply->num_rows ; $num++) {
            $row_reply=$query_reply->fetch_assoc();

            $reply_content = $row_reply['Content'];
            $reply_belongs = $row_reply['Belongs'];
            $reply_time = $row_reply['PostTime'];
        ?>
        <!-- Below is a reply's format -->
        <div class="wrap_reply">
            <div>
                <table>
                    <tr>
                        <th width="50%"><img src="img_resource/img_Account.png"></th>
                        <th width="40%"><img src="img_resource/img_time.png"</th>
                        <th width="10%"><?php
                            if ($username == $reply_belongs){
                                echo "<a href='#'><img src='img_resource/img_modify.png'></a>" ;
                            }?> </th>

                    </tr>

                    <tr>
                        <td><b><?php echo $reply_belongs ?></b></td>
                        <td><b><?php echo substr($reply_time,0,19) ?></b></td>
                    </tr>
                </table>
                <hr>
                <div>
                    <h2 style="word-wrap: break-word"><?php echo $reply_content?></h2>
                </div>
            </div>
        </div>
        <?php
    }
?>
<!-- -->

</body>

</html>
