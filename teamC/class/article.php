<?php
require_once __DIR__ . '/DbData.php';

class article extends DbData
{
  // 記事を登録
  public function addarticle($userId, $text)
  {
    $sql = "insert into article(user_id,text) values(?, ?)";
    $result = $this->exec($sql, [$userId, $text]);
  }
  public function _addarticle($userId, $article_title, $section_title, $section_text, $tag)
  {
    $sql = "insert into article(user_id, article_title, section_title, section_text, tag) values(?, ?, ?, ?, ?)";
    $result = $this->exec($sql, [$userId, $article_title, $section_title, $section_text, $tag]);
  }

  public function updatearticle($userId, $article_title, $section_title, $section_text, $tag,$article_id)
  {
    $sql = "update article set user_id = ?, article_title = ?, section_title = ?, section_text = ?, tag = ? where article_id = ?";
    $result = $this->exec($sql, [$userId, $article_title, $section_title, $section_text, $tag,$article_id]);
  }

  //指定したユーザーの記事を取得
  public function userarticle($userId)
  {
    $sql = "select * from article where user_id = ?";
    $stmt = $this->query($sql, [$userId]);
    $userarticle = $stmt->fetchAll();
    return $userarticle;
  }

  public function getArticleById($article_id)
  {
    $sql = "select * from article inner join users on users.user_id = article.user_id where article_id = ?";
    $stmt = $this->query($sql, [$article_id]);
    $userarticle = $stmt->fetch();
    return $userarticle;
  }
  //全ての記事を取得
  public function allarticle()
  {
    $sql = "select * from article ORDER BY created_at DESC";
    $stmt = $this->query($sql, []);
    $articles = $stmt->fetchAll();
    return $articles;
  }
  public function allarticleJoinUser()
  {
    $sql = "select * from article inner join users on users.user_id = article.user_id ORDER BY created_at DESC";
    $stmt = $this->query($sql, []);
    $articles = $stmt->fetchAll();
    return $articles;
  }

  // 指定した記事を削除する
  public function deletearticle($article_id)
  {
    $sql = "delete from article where article_id = ?";
    $result = $this->exec($sql, [$article_id]);
  }
  //グッド数の追加
  public function goodarticle($good, $article_id)
  {
    $sql = "update article set good = ? where article_id = ?";
    $result = $this->exec($sql, [$good, $article_id]);
  }

  public function allarticle_good()
  {
    $sql = "select * from article inner join users on users.user_id = article.user_id ORDER BY good DESC";
    $stmt = $this->query($sql, []);
    $articles = $stmt->fetchAll();
    return $articles;
  }
}
