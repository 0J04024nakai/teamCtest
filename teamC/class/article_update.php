<?php
$titles = [];
$main_texts = [];
$article_id = $_GET['article_id'];
foreach ($_POST as $key => $value) {
    if (preg_match('/^title[0-9]{1,2}$/', $key)) {
        array_push($titles, $_POST[$key]);
    }
    if (preg_match('/^main_text[0-9]{1,2}$/', $key)) {
        array_push($main_texts, $_POST[$key]);
    }
}

$parsed_title = "";
foreach ($titles as $title) {
    $parsed_title = $parsed_title . $title . "//";
}
$parsed_main_text = "";
foreach ($main_texts as $main_text) {
    $parsed_main_text = $parsed_main_text . $main_text . "//";
}

require_once ('../class/article.php');
if (session_status() == PHP_SESSION_NONE) {
    session_start();
    require_once 'UserLogic.php';
}

$result = UserLogic::checkLogin();

$user_id = null;
if ($result) {
    $login_user = $_SESSION['login_user'];
    $user_id = $login_user['user_id'];
}
$article_title = $_POST['article_title'];
if (empty($tag)) {
    $tag = 'なし';
} else {
    $tag = $_POST['tag'];
    $tag = str_replace(" ", "//", $tag);
}
$Article = new article();
if ($user_id == null) {
    header("Location:../warning.php");
} else {
    $Article->updatearticle($user_id, $article_title, $parsed_title, $parsed_main_text, $tag,$article_id);
    header("Location:../home.php");
}

?>