<?php
require_once __DIR__ . '/article_comments.php';
$comment_id = $_POST['comment_id'];
$evaluation = intval($_POST['stars']);
$article_id = $_POST['article_id'];
$comment = new ArticleComment();
$comment->evaluation($evaluation,$comment_id);
header("Location:../article_detail.php?article_id=$article_id");
?>