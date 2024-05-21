<?php
include "header.php";
$article_id = $_GET['article_id'];
require_once('class/article.php');
require_once('class/article_comments.php');
$articleComment = new ArticleComment();
$comments = $articleComment->SelectComment($article_id);
$Allreview = $articleComment->getReviewById($article_id);
$count = 0;
$reviewSum = 0;
$reviewAvg = 0;
foreach ($Allreview as $review) {
    if ($review[0]) {
        $count++;
        $reviewSum = $reviewSum + (int) $review[0];
    }
}
if ($count != 0) {
    $reviewAvg = $reviewSum / $count;
}

$Article = new article();
$article_data = $Article->getArticleById($article_id);

$section_titles = explode('//', $article_data['section_title']);
$section_main_texts = explode('//', $article_data['section_text']);
$tagList = explode('//', $article_data['tag']);
array_pop($section_main_texts);
array_pop($section_titles);

?>
<link href="css/article_detail.css" rel="stylesheet">
<link href="css/star.css" rel="stylesheet">
<div class="main-container margin-top">
    <div class="content-group">
        <div class="start-content">
            <div class="row">
                <div class="w-20">
                    <div class="icon-wrap" alt="icon">
                        <img src="" class="user-icon" onError="this.onerror=null;this.src='img/user_icon.png'">
                    </div>
                </div>
                <div class="w-80">
                    <span class="title">
                        <?php
                        echo $article_data['name'];
                        ?>
                    </span>
                </div>
                <div class="tag-container">
                    <?php
                    foreach ($tagList as $tag) {
                        echo '
                        <span class="tag">'
                            . $tag .
                            '</span>';
                    }
                    ?>
                </div>
            </div>
            <div class="review">
                <div class="stars-mini">
                    <span class="star-avg">
                        記事平均評価
                        <?php
                        echo round($reviewAvg, 2);
                        ?>
                    </span>
                </div>
            </div>
            <div class="row">

                <div class="article-title">
                    <span>
                        <?php
                        echo $article_data['article_title'];
                        ?>
                    </span>
                </div>
            </div>
            <hr>
            <?php foreach ($section_titles as $index => $title) {
                echo ('
                <div class="row">
                    <span class="main-text-title">
                        ' . ($index + 1) . '.' . htmlspecialchars($section_titles[$index]) .
                    '</span>
                </div>
                <hr>');
                echo nl2br('
                <div class="row">
                <span class="main-text">
                ' . htmlspecialchars($section_main_texts[$index]) .
                    '</span>

                </div>
                ');
            }
            ?>


        </div>
        <div class="end-content">
            <?php foreach ($section_titles as $index => $title) {
                echo '
            <div class="row">
                <span class="main-text">
                ' . ($index + 1) . '.' . htmlspecialchars($section_titles[$index]) .
                    '</span>
            </div>
            ';
            }
            ?>
        </div>
    </div>
    <div class="comment-group">
        <div class="start-content">
            <?php
            $count = 1;
            foreach ($comments as $comment) {
            ?>
                <div class="row">
                    <div class="w-20">
                        <div class="icon-wrap" alt="icon">
                            <img src="" class="user-icon" onError="this.onerror=null;this.src='img/user_icon.png'">
                        </div>
                        <div class="name-wrap">
                            <span class="user-name">
                                <?php echo htmlspecialchars($comment['name']) ?>
                            </span>
                        </div>
                    </div>
                    <div class="w-80">
                        <div class="text-wrap">
                            <span class="answer-text">
                                <?php echo htmlspecialchars($comment['text']) ?>
                            </span>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
        <div class="start-content margin-top-other">
            <form method="post" action="class/posted_article_comment.php">
                <input type="hidden" value="<?php echo $article_id ?>" name="article_id">
                <div class="review">
                    <div class="stars">
                        評価を入力
                        <span>
                            <input id="review01" type="radio" name="review" value="5"><label for="review01">★</label>
                            <input id="review02" type="radio" name="review" value="4"><label for="review02">★</label>
                            <input id="review03" type="radio" name="review" value="3" required="required"><label for="review03">★</label>
                            <input id="review04" type="radio" name="review" value="2"><label for="review04">★</label>
                            <input id="review05" type="radio" name="review" value="1"><label for="review05">★</label>
                        </span>
                    </div>
                </div>
                <div class="row">
                    <textarea class="comment-textarea" placeholder="コメントを入力" name="comment" required="required"></textarea>
                    <div class="content-end">
                        <button class="btn">送信</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>