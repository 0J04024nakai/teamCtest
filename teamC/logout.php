<?php
session_start();
require_once 'class/UserLogic.php';

//ログイン判定
//セッションが切れていたらログインをうながす。
$result = UserLogic::checkLogin();

if (!$result) {
    exit('セッションが切れましたので、ログインし直してください。');
}

//ログアウト処理
UserLogic::logout();

?>


<head>
    <meta charset="UTF-8">
    <title>ログアウト</title>
    <link href="css/form.css" rel="stylesheet">
</head>

<?php
include 'header.php';
?>
<div class="main-container margin-top">
    <h2 class="center">ログアウトしました</h2>
    <div class="button">
        <button class="cancel" onclick="location.href='home.php'">ホーム</button>
    </div>
    <br>
</div>