<?php
// スーパークラスであるDbDataを利用するため
require_once __DIR__ . '/DbData.php';

class goodarticle extends DbData
{
  public function goodarticles($user_id, $article_id)
  {
    //goodarticleテーブルにこのuseridとarticleidの組合せがあるかを確認する
    $sql = "select * from goodarticle where user_id = ? and article_id = ?";
    $stmt = $this->query($sql, [$user_id, $article_id]);
    $item = $stmt->fetch();
    if ($item) {
      //組み合わせがあればすでにグッドを押したことがあるかを確認する(falseなら)押していない
      $sql = "select good from goodarticle where user_id = ? and article_id = ?";
      $stmt = $this->query($sql, [$user_id, $article_id]);
      $articles = $stmt->fetch();
      return $articles;
    } else {
      //組み合わせがなければテーブルに追加
      $sql = "insert into  goodarticle(user_id,article_id,good) value(?,?,false)";
      $this->exec($sql, [$user_id, $article_id]);
      $sql = "select good from goodarticle where user_id = ? and article_id = ?";
      $stmt = $this->query($sql, [$user_id, $article_id]);
      $articles = $stmt->fetch();
      return $articles;
    }
  }

  public function goodupdate($good, $user_id, $article_id)
  {
    $sql = "update goodarticle set good = ? where user_id = ? and article_id = ?";
    $this->exec($sql, [$good, $user_id, $article_id]);
  }
}