<?php
session_start();
require_once 'class/UserLogic.php';

$err = [];

//画像パス登録処理
$hasCreated = UserLogic::changeImg($_POST);

if (!$hasCreated) {
    $err[] = '登録に失敗しました';
}
//ファイルの保存先
$upload = './img/'.$_FILES['file']['name']; 
//アップロードが正しく完了したかチェック
if(move_uploaded_file($_FILES['file']['tmp_name'], $upload)){
  echo 'アップロード完了';
}else{
  echo 'アップロード失敗'; 
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