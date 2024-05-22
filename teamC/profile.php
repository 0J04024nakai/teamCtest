<?php
if(isset($_GET['user_id']) && !empty($_GET['user_id'])){
    $id = $_GET['user_id'];
}
else{
    $id = 'ユーザーIDの情報がありません';
}

session_start();
require_once 'class/UserLogic.php';
//
$result = UserLogic::getUserById($id);
$userData = $result;
//var_dump($userData)

?>


<!DOCTYPE html>
<html lang="ja">
<?php
include "header.php";
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/mypage.css">
    <link rel="stylesheet" href="css/header.css">
    <title>PROFILE</title>
</head>

<body>
    <div class="main-block margin-top">
        <div class="main-block-wrapper">
            <div class="left-contents">
                <div class="icon">プロフィール画像</div>
                <img src="img/<?php echo ($userData['icon_filename']) ?>" id="iconimg">
                <label class="file_label">
                </label>
            </div>
            <div class="right-contents">
                
            <div class="mailaddress">ユーザーID</div>
                <p><?php echo($id) ?></p>
                <div class="name">名前</div>
                <p class="username"><?php echo htmlspecialchars(($userData['name'])) ?></p>
                <div class="name">現在のポイント</div>
                <p class="username"><?php echo ($userData['point']) ?></p>
                <div class="achievements">実績</div>
            </div>
        </div>
            <div class="main-block-wrapper2">
                <div class="question"><?php echo htmlspecialchars(($userData['name'])) ?>さんの質問</div>
                <div class="question"><?php echo htmlspecialchars(($userData['name'])) ?>さんの記事</div>
            </div>
    </div>
</body>

</html>