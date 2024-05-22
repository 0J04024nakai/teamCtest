<?php
include "header.php";
require_once ('../teamC/class/getQA.php');
require_once ('../teamC/class/UserLogic.php');
$userLogic = new UserLogic();
$user_name = $userLogic->getUserById($question['user_id']);
?>
<link href="css/answer.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
<div class="main-container margin-top">
    <div class="row">
        <div class="user-data">
            <div class="w-20">
                <img src="img/<?php echo $user_name['icon_filename'] ?>" class="user-icon"
                    onError="this.onerror=null;this.src='../teamC/img/user_icon.png'">
            </div>
            <div class="w-80">
                <span class="name">
                    <?php echo htmlspecialchars($user_name['name']) ?>
                </span>
            </div>
        </div>
        <form class="qusetion-form" method="post"
            action="../teamC/class/editQuestion.php?question_id=<?= $question_id ?>" enctype="multipart/form-data">
            <?php
            echo '<textarea name="text" class="input lines">' . $question['text'] . '</textarea>';
            ?>
            <input type="submit" value="保存">
        </form>
    </div>
    <hr>
    <span class="label title-margin">回答一覧</span>
    <?php
    foreach ($answers as $answer) {
        echo '
        <div class="row-answer">
            <div class="w-20">
                <div class="icon-wrap" alt="icon">
                    <img src="img/' . $answers['icon_filename'] . '" class="user-icon" onError="this.onerror=null;this.src=\'../teamC/img/user_icon.png\'">
                </div>
                <div class="name-wrap">
                    <span class="user-name">
                            ' . $answer['name'] . '
                    </span>
                </div>
            </div>';
        if ($answer['bestans'] == 1) {
            echo '<div class="bestw-80">
                <div class="bestAns-container">
                <i class="fa-solid fa-medal"></i>
                <div class"bestText-container">
                <div>ベストアンサー</div>';
        } else {
            echo '<div class="w-80">';
        }
        echo '<div class="text-wrap">
                    <span class="answer-text">
                        ' . $answer['text'] . '
                    </span>
                </div>';
        if ($answer['bestans'] == 1)
            echo '</div></div>';
        echo '<form method="POST" action="bestanswer.php?question_id=' . $answer['quetion_id'] . '">
                    <div class="bot-wrap">
                    <span class="bot-label">
                        <input type="hidden" name="answer_id" value="', $answer['answer_id'], '">&nbsp;
                        <input type="hidden" name="user_id" value="', $answer['user_id'], '">&nbsp;
                        <input type="submit" value="ベストアンサーにする">
                    </span>
                </form>
            </div>
        </div>
        </div>
        <hr>
        ';
    }
    ?>
</div>