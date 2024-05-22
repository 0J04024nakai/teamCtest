<?php
if (isset($_GET['user_id']) && !empty($_GET['user_id'])) {
    $id = $_GET['user_id'];
} else {
    $id = 'ユーザーIDの情報がありません';
}

session_start();
require_once 'class/UserLogic.php';
//
$result = UserLogic::getUserById($id);
$userData = $result;
//var_dump($userData)

require_once __DIR__ . '/class/question.php';
$question = new question();
$questions = $question->allquestion();

require_once __DIR__ . '/class/article.php';
$article = new article();
$articles = $article->allarticle();
?>

<!DOCTYPE html>
<html lang="ja">
<?php
include "header.php";
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/mypage.css">
    <link rel="stylesheet" href="css/header.css">
    <title>PROFILE</title>
</head>

<body>
    <div class="main-block margin-top">
        <div class="main-block-wrapper">
            <div class="left-contents">
                <div class="icon">プロフィール画像</div>
                <img src="img/<?php echo ($userData['icon_filename']) ?>" id="iconimg">
                <label class="file_label">
                </label>
            </div>
            <div class="right-contents">

                <div class="mailaddress">ユーザーID</div>
                <p><?php echo ($id) ?></p>
                <div class="name">名前</div>
                <p class="username"><?php echo htmlspecialchars(($userData['name'])) ?></p>
                <div class="name">現在のポイント</div>
                <p class="username"><?php echo ($userData['point']) ?></p>
                <div class="achievements">実績</div>
            </div>
        </div>
        <div class="main-block-wrapper2">

            <div class="postedItem"><?php echo htmlspecialchars(($userData['name'])) ?>さんの質問</div>
            <?php
            foreach ($questions as $ques) {
                if ($ques['user_id'] == $userData['user_id']) {

                    echo '<div class="postedContent">
                            <div class="wrap">
                                <a href="answer.php?question_id=' . $ques['question_id'] . '">' . htmlspecialchars(mb_strimwidth($ques['text'], 0, 70, '...', 'UTF-8')) . '</a>
                                <form action="class/delete_posted_material.php" method="post">
                                    <button type="submit" class="deleteBtn"><i class="fa-solid fa-trash-can fa-lg"></i></button>
                                    <input type="hidden" name="id" value="' . $ques['question_id'] . '">
                                    <input type="hidden" name="type" value="question">
                                </form>
                            </div>
                        </div>';
                }
            }
            ?>

            <div class="postedItem"><?php echo htmlspecialchars(($userData['name'])) ?>さんの記事</div>
            <?php
            foreach ($articles as $art) {
                if ($art['user_id'] == $userData['user_id']) {

                    echo '<div class="postedContent">
                            <div class="wrap">
                                <a href="article_detail.php?article_id=' . $art['article_id'] . '">' . htmlspecialchars(mb_strimwidth($art['article_title'], 0, 70, '...', 'UTF-8')) . '</a>
                                <form action="class/delete_posted_material.php" method="post">
                                    <button type="submit" class="deleteBtn"><i class="fa-solid fa-trash-can fa-lg"></i></button>
                                    <input type="hidden" name="id" value="' . $art['article_id'] . '">
                                    <input type="hidden" name="type" value="article">
                                </form>
                            </div>
                        </div>';
                }
            }
            ?>
        </div>
    </div>
</body>

</html>