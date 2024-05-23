<?php

require_once 'dbconnect.php';

class UserLogic
{
    /**
     * ユーザー登録
     * @param array $userData
     * @return bool $result
     */
    public static function createUser($userData)
    {
        $result = false;
        $sql = 'INSERT INTO users (name, email, password) VALUES (?, ?, ?)';

        $arr = [];
        $arr[] = $userData['name'];
        $arr[] = $userData['email'];
        $arr[] = password_hash($userData['password'], PASSWORD_DEFAULT);
        try {
            $stmt = connect()->prepare($sql);
            $result = $stmt->execute($arr);
            return $result;
        } catch (\Exception $e) {
            return $result;
        }
    }

    /**
     * ログイン処理
     * @param string $email
     * @param string $password
     * @return bool $result
     */
    public static function login($email, $password)
    {
        $result = false;
        $user = self::getUserByEmail($email, $password);

        if (!$user) {
            $_SESSION['msg'] = 'このメールアドレスは登録されていません。';
            return $result;
        }

        //パスワード照会
        if (password_verify($password, $user['password'])) {
            //ログイン成功
            session_regenerate_id(true);
            $_SESSION['login_user'] = $user;
            $result = true;
            return $result;
        }
        $_SESSION['msg'] = 'パスワードが異なります。';
        return $result;
    }


    /**
     * 重複チェック
     * @param string $email
     * @param string $password
     * @return bool $result
     */
    public static function signUpCheck($email)
    {
        $result = false;
        //SQL準備
        //SQL実行
        //SQL結果を返す
        $sql = 'SELECT * FROM users WHERE email = ?';

        $arr = [];
        $arr[] = $email;
        $stmt = connect()->prepare($sql);
        $stmt->execute($arr);
        $user = $stmt->fetch();
        $user ? true : false;
        return $user;
    }


    /**
     * emailが存在するか
     * @param string $email
     * @return array|bool $user|$false
     */
    public static function CheckEmail($email)
    {
        //SQL準備
        //SQL実行
        //SQL結果を返す
        $sql = 'SELECT * FROM users WHERE email = ?';

        $arr = [];
        $arr[] = $email;
        $stmt = connect()->prepare($sql);
        $stmt->execute($arr);
        $user = $stmt->fetch();
        return $user ? true : false;
    }






    /**
     * emailからユーザーを取得
     * @param string $email
     * @return array|bool $user|$false
     */
    public static function getUserByEmail($email)
    {
        //SQL準備
        //SQL実行
        //SQL結果を返す
        $sql = 'SELECT * FROM users WHERE email = ?';

        $arr = [];
        $arr[] = $email;

        try {
            $stmt = connect()->prepare($sql);
            $stmt->execute($arr);
            $user = $stmt->fetch();
            return $user;
        } catch (\Exception $e) {
            return false;
        }
    }
    public static function getUserById($id)
    {
        //SQL準備
        //SQL実行
        //SQL結果を返す
        $sql = 'SELECT * FROM users WHERE user_id = ?';

        $arr = [];
        $arr[] = $id;

        try {
            $stmt = connect()->prepare($sql);
            $stmt->execute($arr);
            $user = $stmt->fetch();
            return $user;
        } catch (\Exception $e) {
            return false;
        }
    }

    /**
     * ログインチェック
     * @param void
     * @return bool $result
     */
    public static function checkLogin()
    {
        $result = false;
        //セッションにログインユーザーが入ってなければfalse
        if (isset($_SESSION['login_user']) && $_SESSION['login_user']['user_id'] > 0) {
            return $result = true;
        }
        return $result;
    }
    /**
     * ログアウト
     * @param void
     * @return bool $result
     */
    public static function logout()
    {
        $_SESSION = array();
        session_destroy();
    }


    /**
     * パスワード変更
     * @param array $userData
     * @return bool $result
     */
    public static function changePwd($userData)
    {
        $result = false;
        $sql = 'UPDATE users SET password = ? WHERE user_id = ?';

        $arr = [];
        $arr[] = password_hash($userData['password'], PASSWORD_DEFAULT);
        //var_dump($userData);
        $arr[] = $userData['user_id'];

        try {
            $stmt = connect()->prepare($sql);
            $result = $stmt->execute($arr);
            return $result;
        } catch (\Exception $e) {
            return $result;
        }
    }
    /**
     * プロフィール画像変更
     * @param array $userData
     * @return bool $result
     */
    public static function changeImg($userData)
    {
        $result = false;
        $sql = 'UPDATE users SET icon_filename = ? WHERE user_id = ?';

        $arr = [];
        foreach ($_FILES as $fil) {
        }
        $arr[] = $fil['full_path'];
        $arr[] = $userData['user_id'];

        try {
            $stmt = connect()->prepare($sql);
            $result = $stmt->execute($arr);
            return $result;
        } catch (\Exception $e) {
            return $result;
        }
    }
}
