<?php
$articleid = $_POST['article_id'];
$good = $_POST['good'];

if (session_status() == PHP_SESSION_NONE) {
    session_start();
    require_once 'class/UserLogic.php';
}

$result = UserLogic::checkLogin();

if ($result) {
    $login_user = $_SESSION['login_user'];
} else {
    $login_user['name'] = 'ゲスト';
}

require_once __DIR__ . '/class/goodArticle.php';
$goodarticle = new goodarticle();
$goodflag = $goodarticle->goodarticles($login_user['user_id'], $articleid);


if ($goodflag['good'] == 1) {
    $good = $good - 1;
    $goodflag = false;
    $goodarticle->goodupdate($goodflag, $login_user['user_id'], $articleid);
} else {
    $good = $good + 1;
    $goodflag = true;
    $goodarticle->goodupdate($goodflag, $login_user['user_id'], $articleid);
}
require_once __DIR__ . '/class/article.php';
$article = new article();
$article->goodarticle($good, $articleid);


header("Location:article.php");