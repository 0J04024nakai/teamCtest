<?php
session_start();
require_once 'class/UserLogic.php';

$err = [];

//ユーザー登録処理
$hasCreated = UserLogic::changePwd($_POST);

if (!$hasCreated) {
    $err[] = '登録に失敗しました';
}

?>

<head>
    <meta charset="UTF-8">
    <title>登録情報変更</title>
    <link href="css/form.css" rel="stylesheet">
</head>

<?php
include 'header.php';
?>
<div class="main-container margin-top">
    <h2 class="center">パスワードを変更しました。</h2>
    <div class="button">
        <button class="cancel" onclick="location.href='mypage.php'">マイページ</button>
    </div>
    <div class="button">
        <button class="cancel" onclick="location.href='home.php'">ホーム</button>
    </div>
    <br>
</div>