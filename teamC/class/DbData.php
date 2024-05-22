<?php
require_once('LoadIni.php');
class DbData  // DbDataクラスの宣言	
{
    protected $pdo;  // PDOオブジェクト用のプロパティ（メンバ変数）の宣言						

    // コンストラクタ
    public function __construct()
    {
        $loadIni = new LoadIni();

        // PDOオブジェクトを生成する 															
        //$dsn = 'mysql:host=localhost;dbname=teamc;charset=utf8';
        //$user = 'kobe';
        //$password = 'denshi';
        $dsn = 'mysql:host=db;dbname=' . $loadIni->DATABASE_NAME . ';charset=utf8';
        $user = $loadIni->DATABASE_USERNAME;
        $password = $loadIni->DATABASE_PASSWORD;
        try {
            $this->pdo = new PDO($dsn, $user, $password);
        } catch (Exception $e) {
            echo 'Error:' . $e->getMessage();
            die();
        }
    }

    protected function query($sql, $array_params)
    {
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($array_params);
        return $stmt;  // PDOステートメントオブジェクトを返すのでfetch( )、fetchAll( )で結果セットを取得									
    }

    // INSERT、UPDATE、DELETE文実行用のメソッド	
    protected function exec($sql, $array_params)
    {
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($array_params);  // 成功：true、失敗：false
        return $stmt;
    }
}
