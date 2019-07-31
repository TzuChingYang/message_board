

<!DOCTYPE html>

<html lang="zh-TW">

<head>

    <title>TOPIC</title>

    <style>
        #menu {
            position: fixed;
            right: 0;
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
    <li style="color:black"><a href="#L384" style="font-size: 25px;color:red;"><b>Profile</b></a>
    <li><a href="TopicList_page.php" style="font-size: 25px;color:red;"><b>Topic</b></a>
    <li><a href="Login_page.php" style="font-size: 25px;color:red;"><b>Logout</b></a>

</ul>

<div class="wrap" style="background-color: lightsalmon">
    <div>
        <h1 class="title"> Message Boarad </h1>

        <div class="byUser">
            <span class="title">All post by User : </span>
            <select id="selUser">
                <option value=0>All</option>
            </select>
            <button type="button" onclick="searchUser()">Search </button>
        </div>
    </div>

</div>

<div class="wrap" onclick="location.href='https://www.ifreesite.com/color/'">
    <div>
        <h1 class="title">Posts</h1>
        <p class="test">bbbb</p>
        <div>
            <p class="test">cccc</p>
        </div>
    </div>

    <p class="reply"> aaaaa</p>
</div>

<div class="wrap">
        <div>
            <h1 class="title">s</h1>
            <p class="test">bbbb</p>
            <div>
                <p class="test">cccc</p>
            </div>
        </div>

        <p class="reply"> aaaaa</p>
</div>


</body>

</html>

