<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
    require_once 'UserLogic.php';
}

$result = UserLogic::checkLogin();

$user_id = null;
if ($result) {
    $login_user = $_SESSION['login_user'];
    $user_id = $login_user['user_id'];
} else {
    $login_user['name'] = 'ゲスト';
}

$article_id = $_POST["article_id"];
$comment = $_POST['comment'];
$review = $_POST['review'];
//var_dump($comment, $article_id, $review);
require_once ("article_comments.php");
$articleComment = new ArticleComment();

if ($user_id == null) {
    header("Location:../warning.php");
} else {
    $articleComment->InsertComment($article_id, $user_id, $comment, $review);
    header('Location:../article_detail.php?article_id=' . $article_id);
}

?>