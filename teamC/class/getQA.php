<?php
require_once __DIR__ . '/question.php';
require_once __DIR__ . '/answer.php';
$question_id = $_GET['question_id'];
$q = new question();
$a = new answer();
try {
    $question = $q->getQuestion($question_id);
    $answers = $a->qanswer($question_id);
} catch (Exception $e) {
    var_dump($e);
}
?>