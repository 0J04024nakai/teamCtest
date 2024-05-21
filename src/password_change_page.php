<?php
session_start();
require_once 'class/UserLogic.php';
//ログイン判定
$result = UserLogic::checkLogin();

if (!$result) {
    $_SESSION['login_err'] = 'ユーザー登録してログインしてください';
    header('Location: signup_form.php');
    return;
}


$login_err = isset($_SESSION['login_err']) ? $_SESSION['login_err'] : null;
unset($_SESSION['login_err']);

$login_user = $_SESSION['login_user'];
//var_dump($userData['icon_filename']);
?>

<!DOCTYPE html>
<html lang="ja">
<?php
include "header.php";
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=0.8">
    <link rel="stylesheet" href="css/mypage.css">
    <link rel="stylesheet" href="css/header.css">
    <title>mypage</title>
</head>
<script type="text/javascript">
    function check() {
        var check3 = document.form.pw1.value;
        var check4 = document.form.pw2.value;

        if (check3 != check4) {
            document.getElementById('alert').innerHTML = "<p>確認用パスワードが異なります。</p>";
            return false;
        } else {
            return true;
        }
    }
</script>

<body>
    <div class="main-block margin-top">
        <div class="main-block-wrapper2">
            <div class="password">パスワード変更</div>
            <div id="alert">
                <?php if (isset($login_err)) : ?>
                    <p><?php echo $login_err; ?></p>
                <?php endif; ?>
            </div>
            <form action="passwordchange.php" method="POST" name="form1">
                <h3>新しいパスワード</h3>
                <input type="password" id="pw1" name="password" placeholder="パスワード" required="required">
                <h3>新しいパスワード確認用</h3>
                <p>※同じパスワードをもう一度入力してください</p>
                <input type="password" id="pw2" name="password" placeholder="パスワード確認用" required="required"><br>
                <input type="hidden" name="user_id" value="<?php echo ($login_user['user_id']) ?>">
                <input onclick="return check()" type="submit" value="パスワードを変更">
            </form>
        </div>
    </div>
    </div>
</body>

</html>