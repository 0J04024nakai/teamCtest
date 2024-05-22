<?php
session_start();
require_once 'class/UserLogic.php';
//ログイン判定
$result = UserLogic::checkLogin();

if (!$result) {
    $_SESSION['login_err'] = 'ユーザー登録してログインしてください';
    header('Location: signup_form.php');
    return;
}


$login_err = isset($_SESSION['login_err']) ? $_SESSION['login_err'] : null;
unset($_SESSION['login_err']);

$login_user = $_SESSION['login_user'];
//var_dump($userData['icon_filename']);

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
    <meta name="viewport" content="width=device-width, initial-scale=0.8">
    <link rel="stylesheet" href="css/mypage.css">
    <link rel="stylesheet" href="css/header.css">
    <link href="https://use.fontawesome.com/releases/v6.5.0/css/all.css" rel="stylesheet">
    <title>mypage</title>
</head>
<script type="text/javascript">
    function check() {
        var check3 = document.form.pw1.value;
        var check4 = document.form.pw2.value;

        if (check3 != check4) {
            document.getElementById('alert').innerHTML = "<p>確認用パスワードが異なります。</p>";
            return false;
        } else {
            return true;
        }
    }
    function imgdata(input) {
        console.log(input);
        for (let i = 0; i < input.files.length; i++) {
            console.log(input.files[i]);
        }
        var filedata = input.files[0];
        console.log(filedata.name);
        document.getElementById('filename').innerHTML = "<p>" + filedata.name + "</p>";
        return false;
    }

</script>

<body>
    <div class="main-block margin-top">
        <div class="main-block-wrapper">
            <div class="left-contents">
                <div class="icon">プロフィール画像</div>
                <img src="img/<?php echo ($login_user['icon_filename']) ?>" id="iconimg">
                <form method="POST" action="iconchange.php" name="form2" enctype="multipart/form-data">
                    <label class="selectimg">ファイルを選択
                        <input type="file" name="file" id="file" onchange="imgdata(this)" accept=".png, .jpg, .jpeg"
                            required>
                    </label>
                    <div id="filename">
                    </div>
                    <input type="hidden" name="user_id" value="<?php echo ($login_user['user_id']) ?>">
                    <input type="submit" class="iconchange" value="変更">
                </form>
            </div>
            <div class="right-contents">
                <div class="mailaddress">ユーザーID</div>
                <p><?php echo ($login_user['user_id']) ?></p>
                <div class="name">名前</div>
                <p class="username"><?php echo htmlspecialchars(($login_user['name'])) ?></p>
                <div class="mailaddress">メールアドレス</div>
                <p><?php echo ($login_user['email']) ?></p>
                <div class="mailaddress">現在のポイント</div>
                <p><?php echo ($login_user['point']) ?></p>

            </div>
        </div>
        <div class="main-block-wrapper2">
            <div class="password">パスワード変更</div>
            <a href="password_change_page.php" class="center"><input class="password-change" type="button"
                    value="パスワードを変更"></a>
            <div class="postedItem">自分の質問</div>
                <?php 
                foreach ($questions as $ques) {
                    if ($ques['user_id'] == $login_user['user_id']){
                        
                        echo '<div class="postedContent">
                            <div class="wrap">
                                <a href="myquestion.php?question_id='. $ques['question_id'].'">'. mb_strimwidth($ques['text'], 0, 70, '...', 'UTF-8').'</a>
                                <form action="class/delete_posted_material.php" method="post">
                                    <button type="submit" class="deleteBtn"><i class="fa-solid fa-trash-can fa-lg"></i></button>
                                    <input type="hidden" name="id" value="'. $ques['question_id'].'">
                                    <input type="hidden" name="type" value="question">
                                </form>
                            </div>
                        </div>';
                    }
                }
                ?>
                
            <div class="postedItem">自分の記事</div>
            <?php 
                foreach ($articles as $art) {
                    if ($art['user_id'] == $login_user['user_id']){
                        
                        echo '<div class="postedContent">
                            <div class="wrap">
                                <a href="article_detail.php?article_id='. $art['article_id'].'">'. mb_strimwidth($art['article_title'], 0, 70, '...', 'UTF-8').'</a>
                                <form action="class/delete_posted_material.php" method="post">
                                    <button type="submit" class="deleteBtn"><i class="fa-solid fa-trash-can fa-lg"></i></button>
                                    <input type="hidden" name="id" value="'. $art['article_id'].'">
                                    <input type="hidden" name="type" value="article">
                                </form>
                            </div>
                        </div>';                        
                    }
                }
                ?>
        </div>
    </div>
    </div>
</body>

</html>