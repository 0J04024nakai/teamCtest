<?php
include "header.php";
?>
<link href="css/article_post.css" rel="stylesheet">
<div class="main-container margin-top">
    <form method="post" action="class/article_post.php">
        <div class="row">
            <span class="label">記事タイトル</span>
            <input class="input" name="article_title" required="required">
        </div>
        <div class="row">
            <span class="label">タグ(半角スペースで区切って入力してください)</span>
            <input class="input" name="tag">
        </div>
        <div id="section-group">
            <div class="row-right">
                <span class="section">セクション1</span>
                <div class="indent">
                    <span class="label">セクションタイトル</span>
                    <input class="input" name="title1" required="required">
                    <span class="label">セクション本文</span>
                    <textarea class="input " name="main_text1" required="required"></textarea>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="btn-group">
                <button type="button" class="btn-plus" onclick="addSection()">+</button>
                <button type="button" class="btn-minus" onclick="deleteSection()">-</button>
            </div>
        </div>
        <div class="btn-wrap">
            <button class="btn">投稿</button>
        </div>
    </form>
</div>
<script src="script/add_element.js"></script>