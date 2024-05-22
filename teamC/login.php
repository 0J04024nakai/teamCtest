<?php
session_start();
require_once 'class/UserLogic.php';
$err = [];
if (!$email = filter_input(INPUT_POST, 'email')) {
    $err['email'] = 'メールアドレスを記入してください。';
}

if (!$password = filter_input(INPUT_POST, 'password')) {
    $err['password'] = 'パスワードを記入してください。';
}

if (count($err) > 0) {
    //エラーがあった戻す
    $_SESSION = $err;
    header('Location: login_form.php');
    return;
}

//ログイン成功処理
$result = UserLogic::login($email, $password);
if (!$result) {
    header('Location: login_form.php');
    return;
}
?>


<head>
    <meta charset="UTF-8">
    <title>ログイン完了</title>
    <link href="css/form.css" rel="stylesheet">
</head>

<?php
include 'header.php';
?>
<div class="main-container margin-top">
    <h2 class="center">ログインしました。</h2>
    <div class="button">
        <button class="cancel" onclick="location.href='mypage.php'">マイページ</button>
    </div>
    <div class="button">
        <button class="cancel" onclick="location.href='home.php'">ホーム</button>
    </div>
    <br>
</div>