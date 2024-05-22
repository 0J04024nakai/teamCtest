<?php
require_once __DIR__ . '/answer.php';

//post var init
$text = $_POST['answer'];
$user_id = $_GET['user_id'];
$question_id = $_POST['question_id'];
//$user_id = (int)$_SESSION['user_id'];

$image = null;
$imageFilename = null;

if ($_FILES['image']['size']) {
    $image = $_FILES['image'];
    $imageFilename = $_FILES['image']['name']; //FILENAME
}

$a = new answer();
if ($a->addanswer($user_id, $text, $question_id, $imageFilename)) {
    if ($imageFilename != null) {
        //move_uploaded_file($image['tmp_name'], '../img/' . $imageFilename);
    }
    header("Location:../answer.php?question_id=" . $question_id);
} else {
    echo 'error';
}