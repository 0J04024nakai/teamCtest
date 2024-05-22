<?php
// スーパークラスであるDbDataを利用するため
require_once __DIR__ . '/DbData.php';

class answer extends DbData
{
    // 回答を登録
    public function addanswer($userId, $text, $questionid, $imagefile)
    {
        //登録する
        try {
            if ($imagefile != null) {  //ファイルが指定されていればそのファイルをデータベースに登録
                $sql = "insert into answers(user_id, text, quetion_id, image_filename) values(?, ?, ?, ?)";
                $result = $this->exec($sql, [$userId, $text, $questionid, $imagefile]);
            } else { //されていなかったら登録しない(デフォルトの画像)
                $sql = "insert into answers(user_id,text,quetion_id) values(?, ?, ?)";
                $result = $this->exec($sql, [$userId, $text, $questionid]);
            }
            return true;
        } catch (Exception $e) {
            return false;
        }

    }

    //回答の取り出し
    public function allanswer($answerid)
    {
        $sql = "select * from answers where quetion_id = ?";
        $stmt = $this->query($sql, [$answerid]);
        $questions = $stmt->fetchAll();
        return $questions;
    }
    //指定した質問をusersテーブルと内部結合して取得
    public function qanswer($questionid)
    {
        $sql = "select * from answers inner join users on users.user_id = answers.user_id where answers.quetion_id = ?";
        $stmt = $this->query($sql, [$questionid]);
        $questions = $stmt->fetchAll();
        return $questions;
    }
    //回答の削除
    public function deleteanswer($answerid)
    {
        $sql = "delete from answer where answer_id = ?";
        $result = $this->exec($sql, [$answerid]);
    }
    //ユーザーの回答
    public function useranswer($userid)
    {
        $sql = "select * from answer where user_id = ?";
        $stmt = $this->query($sql, [$userid]);
        $questions = $stmt->fetchAll();
        return $questions;
    }

    //指定した質問の回答数の取得
    public function countanswer($questionid)
    {
        $sql = "select count(*) from answers where quetion_id = ?";
        $stmt = $this->query($sql, [$questionid]);
        $count = $stmt->fetch();
        return $count;
    }

    //ベストアンサーに指定された回答をベストアンサーに変更。また、ベストアンサー取り消しも出来る
    public function BestAnswer($answer_id, $bestans)
    {
        $sql = "update answers set bestans = ? where answer_id = ?";
        $this->exec($sql, [$bestans, $answer_id]);
    }


    //ベストアンサーに選ばれたユーザーにポイント
    public function PointUser($point, $user_id)
    {
        $sql = "update users set point = ? where user_id = ?";
        $this->exec($sql, [$point, $user_id]);
    }

    //現在ベストアンサーに選ばれているユーザーの取得
    public function BestAnsUser($question_id)
    {
        $sql = "select user_id from answers where quetion_id = ? and bestans = 1";
        $stmt = $this->query($sql, [$question_id]);
        $bestansuser = $stmt->fetch();
        return $bestansuser;

    }

    //指定したユーザーのポイント取得
    public function GetPoint($user_id)
    {
        $sql = "select point from users where user_id = ?";
        $stmt = $this->query($sql, [$user_id]);
        $point = $stmt->fetch();
        return $point;
    }

}
