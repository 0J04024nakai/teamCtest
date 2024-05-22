<?php
session_start();
require_once 'class/UserLogic.php';

//ログイン判定
$result = UserLogic::checkLogin();
if ($result) {
    header('Location: mypage.php');
    return;
}

$login_err = isset($_SESSION['login_err']) ? $_SESSION['login_err'] : null;
unset($_SESSION['login_err']);
?>

<head>
    <meta charset="UTF-8">
    <title>新規作成</title>
    <link href="css/form.css" rel="stylesheet">
</head>


<?php
include 'header.php';
?>
<link href="css/form.css" rel="stylesheet">
<script type="text/javascript">
    function check() {
        var check1 = document.form.name.value;
        var check2 = document.form.email.value;
        var check3 = document.form.pw1.value;
        var check4 = document.form.pw2.value;

        if (check1 == "" || check2 == "" || check3 == "" || check4 == "") {
            document.getElementById('alert').innerHTML = "<p>全項目入力必須です。入力してください。</p>";
            return false;
        } else if (check3 != check4) {
            document.getElementById('alert').innerHTML = "<p>確認用パスワードが異なります。</p>";
            return false;
        } else {
            return true;
        }
    }
</script>
<div class="main-container margin-top">
    <h2 class="center">アカウント新規作成</h2>
    <div id="alert">
        <?php if (isset($login_err)) : ?>
            <p><?php echo $login_err; ?></p>
        <?php endif; ?>
    </div>
    <form action="register.php" method="POST" name="form">
        <div class="row">
            <span class="label">お名前</span>
            <input type="text" id="name" name="name" placeholder="お名前" required="required">
        </div>
        <div class="row">
            <span class="label">メールアドレス</span>
            <input type="email" id="email" name="email" placeholder="メールアドレス" required="required">
        </div>
        <div class="row">
            <span class="label">パスワード</span>
            <input type="password" id="pw1" name="password" placeholder="パスワード" required="required">
        </div>
        <div class="row">
            <span class="label">パスワード確認用</span>
            <p>※同じパスワードをもう一度入力してください</p>
            <input type="password" id="pw2" name="password" placeholder="パスワード確認用" required="required">
        </div>
        <div class="row">
            <input type="submit" class="btn" onclick="return check()" value="登録">
    </form>
</div>
<div class="button">
    <button class="cancel" onclick="location.href='home.php'">キャンセル</button>
</div>
<br>
<div class="forget">ログインは<a href="login_form.php">こちら</a>から</div>
</div>