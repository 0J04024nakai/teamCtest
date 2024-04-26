<?php
include "header.php";
require_once __DIR__ . '/class/question.php';
$question = new question();
require_once __DIR__ . '/class/answer.php';
$answer = new answer();
$questions = $question->allquestion(); //全ての質問を取ってくる
if (empty($_GET['search'])) $_GET['search'] = null;
$searchWord = $_GET['search'];  //検索した際にsearchWordに持ってくる 空ならNULLが入る
if (is_null($searchWord)){  //NULLから空白に変える
    $searchWord = "";
}
if (session_status() == PHP_SESSION_NONE) {
    session_start();
    require_once 'class/UserLogic.php';
}

$result = UserLogic::checkLogin();

if ($result) {
    $login_user = $_SESSION['login_user'];
} else {
    $login_user['name'] = 'ゲスト';
    $login_user['user_id'] = 0;
}
$hitFlag = true;
?>
<link href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" rel="stylesheet">
<link href="css/QandA.css" rel="stylesheet">
<form action="../teamC/QandA.php" method="get" class="search margin-top">
    <input type="search" class="input" name="search" placeholder="キーワードを入力">
    <button type="submit" class="search-btn"><i class="fa fa-search"></i></button>
</form>
<div class="main-container">
    <?php
    foreach ($questions as $ques) {
        
        $questionId = $ques['question_id'];  //質問のIDを保存
        $qanswers = $answer->qanswer($questionId);
        $qcount = $answer->countanswer($questionId);
        $qtext = $ques['text'];
        $question_time = $ques['created_at']; //qusetionが作成された時間を取得
        if (Strlen($qtext) >= 80) {
            $qtext = substr($qtext, 0,);
            $qtext = $qtext . "...";
        }
        $tag = $ques['tag'];
        if ($searchWord != "" && $searchWord != $tag){  //検索内容があり、かつタグと違った場合表示しない
            continue;
        }
        else{
            $hitFlag = false;
        }
        echo '
        <div class="row">
            <div class="w-20">
                <div class="icon-wrap" alt="icon">
                    <a href="profile.php?user_id=', $ques['user_id'],'">
                    <img src="" class="user-icon" onError="this.onerror=null;this.src=\'../teamC/img/user_icon.png\'">
                </div>
            </div>
            <div class="w-80">
                <div class="top-wrap">
                    <span class="title">';
        if ($login_user['user_id'] != $ques['user_id']) {
            echo '<a href="answer.php?question_id=', $ques['question_id'], '">
                            ', mb_strimwidth($qtext, 0, 160, '...', 'UTF-8'), '
                        </a>';
        } else {
            echo '<a href="myquestion.php?question_id=', $ques['question_id'], '">
                        ', mb_strimwidth($qtext, 0, 160, '...', 'UTF-8'), '
                        </a>';
        }    
                echo '    
                    </span>
                </div>
                <div class="bot-wrap">
                <!-- 質問日時 -->
                    <span class="time">
                        ', $question_time, '&nbsp;
                    </span>
                    <span class="bot-label">
                        回答
                    </span>
                    <span class="bot-count">
                        ', "$qcount[0]", '
                    </span>
                </div>
            </div>
        </div><hr>
        ';
    }
    ?>
    <?php   //ヒットしてたかどうかでdisplayを変更するクラスを追加する
    $ZeroHitClass = "ZeroHitDisplay";
    if ($hitFlag) $ZeroHitClass = "";
    ?>
    <div class="ZeroHit <?php echo $ZeroHitClass; ?>">
        <p>検索結果が見つかりませんでした</p>
    </div>
</div>
