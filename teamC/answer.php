<?php
include "header.php";
require_once('class/getQA.php');
require_once('class/UserLogic.php');
$userLogic = new UserLogic();
$user = $userLogic->getUserById($question['user_id']);

if (session_status() == PHP_SESSION_NONE) {
    session_start();
    require_once 'UserLogic.php';
}

$result = UserLogic::checkLogin();

if ($result) {
    $login_user = $_SESSION['login_user'];
    $user_id = $login_user['user_id'];
} else {
    $login_user['name'] = 'ゲスト';
    $user_id = 1;
}

?>
<link href="css/answer.css" rel="stylesheet">
<link href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />

<div class="main-container margin-top">
    <?php if ($user_id != 1) { ?>
        <form class="answer-form" method="post" action="class/sendAnswer.php?user_id=<?= $user_id ?>" enctype="multipart/form-data">
        <?php } else { ?>
            <form class="answer-form" method="post" action="warning.php" enctype="multipart/form-data">
            <?php } ?>
            <div class="row">
                <div class="user-data">
                    <div class="w-20">
                        <img src="img/<?php echo $user['icon_filename'] ?>" class="user-icon" onError="this.onerror=null;this.src='img/user_icon.png'">
                    </div>
                    <div class="w-80">
                        <span class="name">
                            <?php echo htmlspecialchars($user['name']) ?>
                        </span>
                    </div>
                </div>
                <?php
                echo nl2br('<p class="question-text">' . htmlspecialchars($question['text']) . '</p>');
                ?>
            </div>
            <hr class="hr-margin">
            <input type="hidden" name="question_id" value="<?php echo ($question['question_id']); ?>">
            <div class="row">
                <span class="label">回答内容</span>
                <textarea class="input lines" name="answer" required="required"></textarea>
            </div>
            <div class="row">
                <span class="label">画像添付</span>
                <input type="file" accept="image/*" class="input" name="image">
            </div>
            <div class="row">
                <div class="content-end">
                    <button type="submit" class="btn">送信</button>
                </div>
            </div>
            </form>
            <hr>
            <span class="label title-margin">回答一覧</span>
            <?php
            foreach ($answers as $answer) {
                echo '
        <div class="row-answer">
            <div class="w-20">
                <div class="icon-wrap" alt="icon">
                    <img src="img/' . $answer['icon_filename'] . '" class="user-icon" onError="this.onerror=null;this.src=\'img/user_icon.png\'">
                </div>
                <div class="name-wrap">
                    <span class="user-name">
                            ' . htmlspecialchars($answer['name']) . '
                    </span>
                </div>
            </div>';
                if ($answer['bestans'] == 1) {
                    echo '<div class="bestw-80">
                        <i class="fa-solid fa-medal"></i>
                        <div class"bestText-container">
                        <div>ベストアンサー</div>';
                } else {
                    echo '<div class="w-80">';
                }
                echo '<div class="text-wrap">
                    <span class="answer-text">
                        ' . htmlspecialchars($answer['text']) . '
                    </span>
                </div>';
                if ($answer['bestans'] == 1)
                    echo '</div>';
                echo '<form method="POST" action="bestanswer.php?question_id=' . $answer['quetion_id'] . '">
                    <div class="bot-wrap">
                </form>
            </div>
        </div>
        </div>
        <hr>
        ';
            }
            ?>
</div>