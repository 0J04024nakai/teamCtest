<?php
session_start();
require_once 'class/UserLogic.php';

//ログイン判定
$result = UserLogic::checkLogin();
if ($result) {
    header('Location: mypage.php');
    return;
}

$err = $_SESSION;

$_SESSION = array();
session_destroy();
?>

<head>
    <meta charset="UTF-8">
    <title>ログイン</title>
    <link href="css/form.css" rel="stylesheet">
</head>

<?php
include 'header.php';
?>
<div class="main-container margin-top">
    <h2 class="center">ログイン</h2>
    <div id="alert">
        <?php if (isset($err['email'])) : ?>
            <p><?php echo $err['email']; ?></p>
        <?php endif; ?>
        <?php if (isset($err['password'])) : ?>
            <p><?php echo $err['password']; ?></p>
        <?php endif; ?>
        <?php if (isset($err['msg'])) : ?>
            <p><?php echo $err['msg']; ?></p>
        <?php endif; ?>
        <?php if (isset($login_err)) : ?>
            <p><?php echo $login_err; ?></p>
        <?php endif; ?>
    </div>
    <form action="login.php" method="POST">
        <div class="row">
            <span class="label">メールアドレス</span>
            <input type="email" name="email" placeholder="ユーザーID/メールアドレス" required="required">
        </div>
        <div class="row">
            <span class="label">パスワード</span>
            <input type="password" name="password" placeholder="パスワード" required="required">
        </div>
        <div class="row">
            <input type="submit" class="btn" value="ログイン">
    </form>
</div>
<div class="button">
    <button class="cancel" onclick="location.href='home.php'">キャンセル</button>
</div>
<br>
<div class="forget">新規登録は<a href="signup_form.php">こちら</a>から</div>
</div>