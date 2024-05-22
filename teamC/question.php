<?php
include "header.php";
?>
<link href="css/question.css" rel="stylesheet">
<div class="main-container margin-top">
    <?php

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
        require_once 'class/UserLogic.php';
    }

    $user_id = null;
    $result = UserLogic::checkLogin();

    if ($result) {
        $login_user = $_SESSION['login_user'];
        $user_id = $login_user['user_id'];
    } else {
        $login_user['name'] = 'ゲスト';
    }
    if($user_id != null){
    ?>
    <form class="qusetion-form" method="post" action="../teamC/class/sendQuestion.php" enctype="multipart/form-data">
        <?php }else{ ?>
            <form class="qusetion-form" method="post" action="../teamC/warning.php" enctype="multipart/form-data">
            <?php } ?>
        <div class=" row">
            <span class="label">質問内容</span>
            <textarea class="input lines" name="text" required="required"></textarea>
        </div>
        <div class="row">
            <span class="label">タグ・キーワード</span>
            <input type="text" name="keyword">
        </div>
        <div class="row">
            <span class="label">画像添付</span>
            <input type="file" accept="image/*" class="input" name="image">
        </div>
        <div class="row">
            <div class="content-end">
                <button type="submit" class="btn">送信</button>
            </div>
        </div>
    </form>
</div>