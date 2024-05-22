<?php
require_once __DIR__ . '/question.php';

//post var init
$text = $_POST['text'];
$question_id = $_GET['question_id'];
$image = null;
$imageFilename = null;

if (session_status() == PHP_SESSION_NONE) {
    session_start();
    require_once 'UserLogic.php';
}

$result = UserLogic::checkLogin();

if ($result) {
    $login_user = $_SESSION['login_user'];
    $user_id = $login_user['user_id'];
} else {
    $login_user['name'] = 'ゲスト';
}



//$user_id = (int)$_SESSION['user_id'];


$q = new question();
if ($q->EditQuestion($question_id, $text)) {
    header("Location:../myquestion.php?question_id=".$question_id);
} else {
    echo 'error';
}

?>