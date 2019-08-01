<?php
    session_start() ;
    $order = $_GET['order'] ;
    $_SESSION['order']=$order;
?>

<!-- Fetch DataBase information Here -->
<?php
    /* ========================================= */
    // Connect to data base
    // SQL Topic table to get data of Post...
    /* ========================================= */
    // Get Connection
    $username = $_SESSION['Username'] ;

    // Data base connect
    $server = 'localhost' ;
    $db_username = 'tzching' ;
    $db_password = '00000000' ;
    $db_name ='MessageBoard' ;

    $conn = new mysqli($server,$db_username,$db_password,$db_name) ;

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

?>


<!DOCTYPE html>

<html lang="zh-TW">

<head>

    <title>TOPIC</title>

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
            width:680px;
            border:0px solid #000;
            text-align:center;
            border-collapse:collapse;
        }
        th {
            padding: 1px;
            border:0px solid #000;
            color:#fff;
        }
        td {
            border:0px solid #000;
            padding:5px;
        }
        .wrap{
            width: 720px;
            margin: 15px auto;
            padding: 15px 10px;
            background: white;
            border: 2px solid #DBDBDB;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            border-radius: 5px;
        }
        .wrap:hover{
            width: 720px;
            margin: 15px auto;
            padding: 15px 10px;
            background: #f0f0f0;
            border: 2px solid #DBDBDB;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            border-radius: 5px;
            cursor: pointer;
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

<div class="wrap" style="background-color: lightsalmon">
    <div>
        <h1 class="title"> Message Boarad </h1>

        <div class="byUser">
            <span class="title">Post order : </span>
            <form method='get' action="Oder_response.php">
                <?php
                    if ($order ==0){ //New
                        echo "<input type='radio' name='order' value='0' checked><b>New</b>" ;
                        echo "<input type='radio' name='order' value='1'> <b>Old</b>" ;
                        echo "<input type='submit' value='Search'> ";
                    }else if($order ==1){ //Old
                        echo "<input type='radio' name='order' value='0' ><b>New</b>" ;
                        echo "<input type='radio' name='order' value='1' checked> <b>Old</b>" ;
                        echo "<input type='submit' value='Search'> ";
                    }
                ?>
            </form>
        </div>
    </div>

</div>

<!-- First get Data from database-->
<?php
// Get data now
if ($order ==0){
    $sql = "Select * from Topic  order by PostTime DESC";
}else if($order ==1){
    $sql = "Select * from Topic  order by PostTime ASC";
}

$query = $conn->query($sql) ;

for ($num=0; $num < $query->num_rows ; $num++){
    $row = $query->fetch_assoc();
    ?>
<div class="wrap" onclick="location.href='https://www.ifreesite.com/color/'">
    <div>
        <h1 class="title" style="text-align: center"><?php echo $row['Topic']?> </h1>
        <div>
            <br>
            <table>
                <tr>
                    <th width="40%"> <img src="img_resource/img_Account.png"></th>
                    <th width="40%"> <img src="img_resource/img_reply.png"></th>
                    <th width="20%"> <img src="img_resource/img_time.png"></th>
                </tr>
                <tr>
                    <td width="40%"><b><?php echo $row['Belongs']?></b></td>
                    <td width="40%"><b><?php echo $row['Num_Reply']?></b></td>
                    <td width="20%"><?php echo substr($row['PostTime'],0,19)?></td>
                </tr>
            </table>
        </div>
    </div>
</div>

<?php
}
?>


</body>

</html>

