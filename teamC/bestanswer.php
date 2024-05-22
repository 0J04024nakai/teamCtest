<?php
require_once __DIR__ . '/class/question.php';
$question = new question();
require_once __DIR__ . '/class/answer.php';
$answer = new answer();
$question_id = $_GET['question_id'];
$answer_id = $_POST['answer_id'];
$ansuser_id = $_POST['user_id'];    //回答したユーザーのユーザーID
$answers = $answer->allanswer($question_id);
$bestansuser =  $answer->BestAnsUser($question_id); //ベストアンサー状況の取得
if(isset($bestansuser)){
    $points = $answer->GetPoint($bestansuser['user_id']);   //ベストアンサーに選ばれているユーザーのポイント取得
    $point = $points['point'] - 1;    //旧ベストアンサーユーザーのポイントを減らす
    $answer->PointUser($point,$bestansuser['user_id']);
}
foreach ($answers as $ans){
    var_dump($ans['answer_id'] == $answer_id);
    if ($ans['answer_id'] == $answer_id){
        $bestans = $answer->BestAnswer($ans['answer_id'],true);   //ベストアンサーに設定する
    }
    else{
        $bestans = $answer->BestAnswer($ans['answer_id'],false);   //それ以外をベストアンサーから外す
    }    
}

$bestansuser =  $answer->BestAnsUser($question_id); //ベストアンサー状況の取得

if(isset($bestansuser)){
    $points = $answer->GetPoint($bestansuser['user_id']);   //ベストアンサーに選ばれているユーザーのポイント取得
    $point = $points['point'] + 1;    //旧ベストアンサーユーザーのポイントを減らす
    var_dump($point);
    $answer->PointUser($point,$bestansuser['user_id']);
}

$questions = $question->allquestion(); //全ての質問を取ってくる
require_once __DIR__ . '/myquestion.php';
?>