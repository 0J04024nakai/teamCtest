<?php
require_once __DIR__ . '/question.php';
require_once __DIR__ . '/article.php';

$id = "";
if(isset($_POST['id'])){
    $id = $_POST['id'];
}

if($_POST['type'] == "question"){
    $question = new question;
    $question->deletequestion($id);
}
elseif($_POST['type'] == "article"){
    $article = new article();
    $article->deletearticle($id);
}

header("Location:../mypage.php");

?>