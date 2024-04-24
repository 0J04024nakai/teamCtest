<?php
include "header.php";
require_once __DIR__ . '/class/question.php';
$question = new question();
require_once __DIR__ . '/class/answer.php';
$answer = new answer();
$questions = $question->allquestion(); //全ての質問を取ってくる

if (session_status() == PHP_SESSION_NONE) {
    session_start();
    require_once 'class/UserLogic.php';
}

$result = UserLogic::checkLogin();

if ($result) {
    $login_user = $_SESSION['login_user'];
} else {
    $login_user['name'] = 'ゲスト';
}

?>
<link href="css/article.css" rel="stylesheet">
<div class="main-container margin-top">
    <?php
    foreach ($questions as $ques) {
        $questionId = $ques['question_id'];  //質問のIDを保存
        $qanswers = $answer->qanswer($questionId);
        $qcount = $answer->countanswer($questionId);
        $qtext = $ques['text'];
        if (Strlen($qtext) >= 80) {
            $qtext = substr($qtext, 0, );
            $qtext = $qtext . "...";
        }
        echo '
        <div class="row">
            <div class="w-20">
                <div class="icon-wrap" alt="icon">
                    <img src="" class="user-icon" onError="this.onerror=null;this.src=\'../teamC/img/user_icon.png\'">
                </div>
            </div>
            <div class="w-80">
                <div class="top-wrap">
                    <span class="title">';
                    if($login_user['user_id'] != $ques['user_id']){
                        echo '<a href="answer.php?question_id=', $ques['question_id'], '">
                            ', mb_strimwidth($qtext, 0, 160, '...', 'UTF-8'), '
                        </a>';
                    }else{
                        echo '<a href="myquestion.php?question_id=', $ques['question_id'], '">
                        ', mb_strimwidth($qtext, 0, 160, '...', 'UTF-8'), '
                        </a>';
                    }
                    echo '    
                    </span>
                </div>
                <div class="bot-wrap">
                    <span class="bot-label">
                        回答
                    </span>
                    <span class="bot-count">
                        ', "$qcount[0]", '
                    </span>
                </div>
            </div>
        </div><hr>
        '
        ;
    }
    ?>
</div>