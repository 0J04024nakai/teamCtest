<?php
include "header.php";

$article_id = $_GET['article_id'];
require_once ('class/article.php');

$Article = new article();
$article_data = $Article->getArticleById($article_id);

$section_titles = explode('//', $article_data['section_title']);
$section_main_texts = explode('//', $article_data['section_text']);
$tagList = explode('//', $article_data['tag']);
array_pop($section_main_texts);
array_pop($section_titles);

?>
<link href="css/article_post.css" rel="stylesheet">
<div class="main-container margin-top">
    <form method="post" action="class/article_update.php?article_id=<?=$article_id?>">
        <div class="row">
            <span class="label">記事タイトル</span>
            <input class="input" name="article_title" required="required" value="<?= $article_data['article_title'] ?>">
        </div>
        <div class="row">
            <span class="label">タグ(半角スペースで区切って入力してください)</span>
            <input class="input" name="tag" value="<?=$article_data['tag']?>">
        </div>
        <div id="section-group">
            <?php 
            $count = 0;
            foreach ($section_titles as $index => $title) {
                echo '
            <div class="row-right">
            <span class="section">セクション',($index + 1),'</span>
                <div class="indent">
                    <span class="label">セクションタイトル</span>
                    <input class="input" name="title',($index + 1),'" required="required" value="',$section_titles[$index],'">
                    <span class="label">セクション本文</span>
                    <textarea class="input " name="main_text',($index + 1),'" required="required">',$section_main_texts[$index],'</textarea>
                </div>
                </div>';
                $count += 1;
            }
                
            
            ?>
        </div>
        <div class="row">
            <div class="btn-group">
                <button type="button" class="btn-plus" onclick="udt_addSection(<?php echo ($count - 1)?>)">+</button>
                <button type="button" class="btn-minus" onclick="udt_deleteSection(<?php echo ($count - 1)?>)">-</button>
            </div>
        </div>
        <div class="btn-wrap">
            <button class="btn">投稿</button>
        </div>
    </form>
</div>
<script src="script/add_element.js"></script>