<?php
include "header.php";
?>
<link href="css/article_post.css" rel="stylesheet">
<div class="main-container margin-top">
    <form class="">
        <div class="row">
            <span class="label">記事タイトル</span>
            <input class="input" name="title">
        </div>
        <div class="row">
            <span class="label">タグ</span>
            <input class="input" name="tag">
        </div>
        <div id="section-group">
            <div class="row-right">
                <span class="section">セクション1</span>
                <div class="indent">
                    <span class="label">セクションタイトル</span>
                    <input class="input" name="title">
                    <span class="label">セクション本文</span>
                    <input class="input " name="main_text">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="btn-group">
                <button type="button" class="btn-plus" onclick="addSection()">+</button>
                <button type="button" class="btn-minus" onclick="deleteSection()">-</button>
            </div>
        </div>
    </form>
</div>
<script src="script/add_element.js"></script>