<?php
session_start();
require_once 'class/UserLogic.php';
//時間取得
$timestamp = time();
$err = [];
//ファイルの保存先
$upload = 'img/' . $timestamp . $_SESSION['login_user']['user_id'] . $_FILES['file']['name'];
//ファイル名
$temp_fileImage =  $timestamp . $_SESSION['login_user']['user_id'] . $_FILES['file']['name'];
//アップロードが正しく完了したかチェック
if (move_uploaded_file($_FILES['file']['tmp_name'], $upload)) {
    echo 'アップロード完了';
    //元の画像を削除(volume)
    $file_to_delete = '/var/www/html/img/' . $_SESSION['login_user']['icon_filename'];
    if (file_exists($file_to_delete)) {
        unlink($file_to_delete);
    }
    $_SESSION['login_user']['icon_filename'] = $temp_fileImage;
    var_dump($_SESSION['login_user']['icon_filename']);
} else {
    echo 'アップロード失敗';
}
//画像パス登録処理
$hasCreated = UserLogic::changeImg($_SESSION['login_user']['user_id'], $temp_fileImage);
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
    <h2 class="center">プロフィール画像を変更しました。</h2>
    <div class="button">
        <button class="cancel" onclick="location.href='mypage.php'">マイページ</button>
    </div>
    <div class="button">
        <button class="cancel" onclick="location.href='home.php'">ホーム</button>
    </div>
    <br>
</div>