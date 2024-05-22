<?php
require_once __DIR__ . '/question.php';

//post var init
$text = $_POST['text'];
if(empty($keyword)){
    $keyword = 'なし';
}
else{
    $keyword = $_POST['keyword'];
}

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

if ($_FILES['image']['size']) {
    $image = $_FILES['image'];
    $imageFilename = $_FILES['image']['name']; //FILENAME
}

$q = new question();
if ($q->addquestion($user_id, $text, $keyword, $imageFilename)) {
    if ($imageFilename != null) {
        //move_uploaded_file($image['tmp_name'], '../img/' . $imageFilename);
    }
    header("Location:../QandA.php");
} else {
    echo 'error';
}

?>