<?php
session_start();
$username = $_SESSION['Username'];
$order = $_SESSION['order'] ;

$topic = $_SESSION['topic'];
$content =$_SESSION['content'] ;
$posttime = $_SESSION['posttime'] ;
?>

<!DOCTYPE html>

<html lang="zh-TW">

<head>

    <title>Edit Post</title>

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
        .wrap{
            width: 720px;
            height: 610px;
            margin: 15px auto;
            padding: 15px 10px;
            background: white;
            border: 2px solid #DBDBDB;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            border-radius: 5px;
        }

        .wrap_title{
            width: 680px;
            height: 22px;
            font-size: 20px;
            margin: 15px auto;
            padding: 15px 10px;
            background: white;
            border: 2px solid #DBDBDB;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
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

        .test{
            background-color: greenyellow;
        }
    </style>
</head>

<body id="body">

<ul id=menu >
    <?php echo "<li><a href=TopicList_page.php?order=$order style='font-size: 25px;color:red;'><b>MessageBoard</b></a> "?>
    <li><a href="NewPost_page.php" style="font-size: 25px;color:red;"><b>NewPost</b></a>
    <li><a href="Login_page.php" style="font-size: 25px;color:red;"><b>Logout</b></a>

</ul>



<div class="wrap" style="background-color: lemonchiffon" >
    <div >
        <h1 class="title" style="color: rebeccapurple; text-align: center ; font-size: 30px">Posts Topic</h1>
        <h2 style="color: rebeccapurple; text-align: right" ><?php echo $username ?> <hr></h2>
        <h2 style="color: rebeccapurple; font-size: 25px">Title:
            <form method="post" action="EditPost_response.php" target="_self">
                <input class="wrap_title" type="text" name="title" placeholder="Topic Here" value="<?php echo $topic ?>"> <hr></h2>
        <div >
            <div>
                <h2 style="color: rebeccapurple; font-size: 20px">Content:</h2>
                <textarea class="wrap_content" style="font-size: 20px" name="content" placeholder="Content Here" ><?php echo $content?></textarea>
                <div align="center">
                    <input class="input_submit" type="submit" value="Edit" >
                </div>

                </form>
            </div>
        </div>
    </div>
</div>



</body>

</html>

