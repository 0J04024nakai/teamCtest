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

$email = filter_input(INPUT_POST, 'email');
//重複チェック
$result = UserLogic::signUpCheck($email);
if ($result) {
    $_SESSION['login_err'] = 'このメールアドレスは登録済みです。';
    header('Location: signup_form.php');
    return;
}

//ユーザー登録処理
$hasCreated = UserLogic::createUser($_POST);

if (!$hasCreated) {
    $err[] = '登録に失敗しました';
}

?>

<head>
    <meta charset="UTF-8">
    <title>登録完了</title>
    <link href="css/form.css" rel="stylesheet">
</head>

<?php
include 'header.php';
?>
<div class="main-container margin-top">
    <h2 class="center">登録完了</h2>
    <div class="button">
        <button class="cancel" onclick="location.href='login_form.php'">ログイン</button>
    </div>
    <div class="button">
        <button class="cancel" onclick="location.href='home.php'">ホーム</button>
    </div>
    <br>
</div>