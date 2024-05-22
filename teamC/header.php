<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
    require_once 'class/UserLogic.php';
}
//ログイン判定
$result = UserLogic::checkLogin();

if ($result) {
    $login_user['button1'] = 'MYPAGE';
    $login_user['button2'] = 'LOGOUT';
    $buttonUrl = 'logout.php';
    $questionUrl = 'question.php';
    $articalUrl = 'article_post.php';
} else {
    $login_user['button1'] = 'LOGIN';
    $login_user['button2'] = 'LOGIN';
    $buttonUrl = 'login_form.php';
    $questionUrl = 'warning.php';
    $articalUrl = 'warning.php';
}
?>

<head>
    <link rel="stylesheet" href="css/header.css">
    <meta name="viewport" content="width=device-width,initial-scale=0.8">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kosugi+Maru&family=Outfit:wght@100..900&display=swap" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" rel="stylesheet">

</head>
<div id="hamberger">
    <nav>
        <ul>
            <h3>KOBE DENSHI</h3>
            <li><a href="home.php"><i class="icons fas fa-home"></i>HOME</a></li>
            <li><a href="mypage.php"><i class="far fa-address-card"></i>MYPAGE</a></li>
            <li><a href="QandA.php"><i class="far fa-comments"></i>QUESTION</a></li>
            <li><a href="<?php echo $questionUrl?>"><i class="fas fa-pen"></i>QUESTION POST</a></li>
            <li><a href="article.php"><i class="far fa-newspaper"></i>ARTICLE</a></li>
            <li><a href="<?php echo $articalUrl?>"><i class="fas fa-pen"></i>ARTICLE POST</a></li>
        </ul>
        <button onclick="location.href='<?php echo ($buttonUrl) ?>'">
            <?php echo ($login_user['button2']) ?>
        </button>
    </nav>
    <div class="toggle-btn">
        <span></span>
        <span></span>
        <span></span>
    </div>

    <div id="mask"></div>
</div>
<header>
    <div id="hamberger-area"></div>
    <a id="header" href="home.php">
        <h1>KOBE DENSHI</h1>
    </a>
    <button id="user" onclick="location.href='login_form.php'">
        <?php echo ($login_user['button1']) ?>
    </button>
    <div id="menuarea"></div>
</header>
<script src="script/header.js"></script>