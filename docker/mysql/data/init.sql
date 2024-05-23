-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1
-- 生成日時: 2024-05-23 10:31:59
-- サーバのバージョン： 10.4.28-MariaDB
-- PHP のバージョン: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `teamc`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `answers`
--

CREATE TABLE `answers` (
  `answer_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `text` varchar(255) NOT NULL,
  `quetion_id` int(11) NOT NULL,
  `image_filename` varchar(255) DEFAULT NULL,
  `bestans` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- テーブルのデータのダンプ `answers`
--

INSERT INTO `answers` (`answer_id`, `user_id`, `text`, `quetion_id`, `image_filename`, `bestans`) VALUES
(25, 17, 'DockerでLAMP環境を構築し、マイページから画像を変更してその画像を保存し、元の画像を削除するには、以下の手順を実行します。ここでは、Docker Composeを使用してLAMPスタックをセットアップし、PHPスクリプトを使用して画像のアップロードと削除を行います。', 27, NULL, 0),
(26, 19, 'まずは、Visual Studioを使って新しいWindows Formsアプリケーションを作成します。これは、お料理の準備みたいなものですね。お鍋とフライパンを出しておきましょう。', 26, NULL, 0),
(27, 21, '5つも思い浮かばないです。', 29, NULL, 0),
(28, 19, 'int：整数型。32ビットの符号付き整数を表します。\r\ndouble：倍精度浮動小数点型。64ビットの浮動小数点数を表します。\r\nbool：ブール型。真（true）または偽（false）を表します。\r\nchar：文字型。1つのUnicode文字を表します。\r\nstring：文字列型。文字のシーケンス（文字列）を表します。\r\nなどでどうでしょうか？？', 29, NULL, 1),
(29, 21, '受け入れる他ないかもしれません', 30, NULL, 0),
(30, 19, 'htmlspecialchars()を使えば問題なく表示出来ますよ！', 30, NULL, 1);

-- --------------------------------------------------------

--
-- テーブルの構造 `article`
--

CREATE TABLE `article` (
  `article_id` int(11) NOT NULL,
  `article_title` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `section_title` mediumtext DEFAULT NULL,
  `section_text` text NOT NULL,
  `tag` varchar(255) NOT NULL,
  `good` int(255) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- テーブルのデータのダンプ `article`
--

INSERT INTO `article` (`article_id`, `article_title`, `user_id`, `section_title`, `section_text`, `tag`, `good`, `created_at`, `updated_at`) VALUES
(19, 'Kotlinでrealmを使用してデータを管理する', 17, 'はじめに//Realmを実装する//', '今回はKotlinでrealmを使用してデータの管理を行いました。どんなアプリでもデータを保存をできた方が便利ですよね！！//まずはbuild.gradleのdependenciesに以下のコードを記載します\r\nimplementation \'io.realm:android-adapters:2.1.1\'\r\npluginsには\r\nid \'realm-android\'\r\nを記載します\r\n//', 'なし', 0, '2024-05-22 02:30:45', '2024-05-22 02:32:36'),
(20, 'Pythonのインストール', 19, 'はじめに//Pythonのインストール//初めてのPythonプログラム//基本的なデータ型//', 'こんにちは、みなさん。今日はPythonというプログラミング言語の基礎についてお話しします。Pythonはとても人気があり、初心者にも優しい言語ですので、ぜひ一緒に学んでいきましょうね。//まずはPythonをインストールしましょう。公式サイトから最新のPythonをダウンロードしてインストールしてくださいね。\r\n\r\n1.Python公式サイトにアクセス\r\n2.\"Downloads\"セクションからお使いのOSに合ったバージョンをダウンロード\r\n3.インストーラーを実行して、インストールを完了させます//Pythonのインストールが終わったら、さっそくプログラムを書いてみましょう。簡単なプログラムとして、「Hello, World!」を表示するものを書きます。コードは以下の通りです：\r\nprint(\"Hello, World!\")\r\nこれをエディタに入力して、ファイル名を hello.py として保存します。ターミナルやコマンドプロンプトで次のコマンドを実行すると、プログラムが動きますよ：\r\n画面に \"Hello, World!\" と表示されれば成功です！//Pythonにはいくつかの基本的なデータ型があります。これらを使って様々なデータを扱うことができますよ。\r\n\r\n整数型 (int): 整数を扱います。例: a = 5\r\n浮動小数点型 (float): 小数点を含む数を扱います。例: b = 3.14\r\n文字列型 (str): テキストを扱います。例: c = \"こんにちは\"\r\nリスト型 (list): 複数の値をまとめて扱います。例: d = [1, 2, 3]//', 'なし', 1, '2024-05-22 03:04:22', '2024-05-23 01:10:14'),
(21, 'C#の基礎について', 22, 'はじめに//変数とデータ型//演算子//制御構文//', 'C#（シーシャープ）は、Microsoftが開発したオブジェクト指向のプログラミング言語で、.NETフレームワーク上で動作します。以下にC#の基礎的な概念と構文を説明します。//C#では、変数を宣言して値を格納するために、データ型を指定します。基本的なデータ型には、int（整数）、double（浮動小数点数）、bool（真偽値）、char（文字）、string（文字列）などがあります。//C#には、算術演算子（+、-、*、/、%）、比較演算子（==、!=、<、>、<=、>=）、論理演算子（&&、||、!）などがあります。//C#には、条件分岐やループを処理するための制御構文があります。\r\nif文\r\nif (age >= 18) {\r\n    Console.WriteLine(\"You are an adult.\");\r\n} else {\r\n    Console.WriteLine(\"You are a minor.\");\r\n}\r\n\r\nswitch文\r\nswitch (grade) {\r\n    case \'A\':\r\n        Console.WriteLine(\"Excellent!\");\r\n        break;\r\n    case \'B\':\r\n        Console.WriteLine(\"Good!\");\r\n        break;\r\n    default:\r\n        Console.WriteLine(\"Keep trying!\");\r\n        break;\r\n}\r\n\r\nforループ\r\nfor (int i = 0; i < 10; i++) {\r\n    Console.WriteLine(i);\r\n}\r\n\r\nwhileループ\r\nint count = 0;\r\nwhile (count < 5) {\r\n    Console.WriteLine(count);\r\n    count++;\r\n}//', 'なし', 0, '2024-05-23 00:52:29', '2024-05-23 00:52:29'),
(22, 'SQLの四大命令について', 23, 'はじめに//SELECT文//INSERT文//UPDATE文//DELETE文//最後に//', 'たくさんのデータを使う上でデータベースは必要不可欠ですよね！\r\nそんなデータベースにデータを登録や更新、取り出しから削除まで行う事ができるのがSQL文です。\r\nそんなSQLの基礎である四大命令について今回は学んで行きましょう！！//SELECT文はデータベースからデータを取得します。\r\n書き方は以下の通りです。\r\nSELECT * FROM Employees;//INSERTは新しいデータをテーブルに挿入します。\r\n書き方は以下の通りです。\r\nINSERT INTO Employees (Name, Age, Department) VALUES (\'John Doe\', 30, \'HR\');//UPDATEは既存のデータを更新します。\r\n書き方は以下の通りです。\r\nUPDATE Employees SET Age = 31 WHERE Name = \'John Doe\';//DELETEはデータを削除します。\r\n書き方は以下の通りです。\r\nDELETE FROM Employees WHERE Name = \'John Doe\';//今回は簡単になりましたが、次回はもう少し踏み込んだことも解説していきたいと思っております。\r\n是非この記事のグッドをお願い致します。//', 'なし', 2, '2024-05-23 01:05:42', '2024-05-23 01:22:21');

-- --------------------------------------------------------

--
-- テーブルの構造 `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `text` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `image_filename` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `review` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- テーブルのデータのダンプ `comments`
--

INSERT INTO `comments` (`comment_id`, `article_id`, `user_id`, `text`, `image_filename`, `review`) VALUES
(20, 19, 17, '追記：これで実装は完了です。次は実際に使用していこうと思います。気になる方は私のプロフィールから次の記事に飛んでみてください。\r\n', NULL, 5),
(21, 20, 19, '参考になりました。', NULL, 4),
(22, 20, 19, 'などのコメントお待ちしております。', NULL, 3),
(23, 20, 19, 'プロフィールをご覧ください。', NULL, 3),
(24, 21, 20, '私は最近C#を始めたばかりなのでとても参考になりました！！', NULL, 5),
(25, 21, 21, '演算子のところがホントに分からなかったです。', NULL, 1);

-- --------------------------------------------------------

--
-- テーブルの構造 `goodarticle`
--

CREATE TABLE `goodarticle` (
  `article_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `good` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- テーブルのデータのダンプ `goodarticle`
--

INSERT INTO `goodarticle` (`article_id`, `user_id`, `good`) VALUES
(20, 17, 1),
(22, 17, 1),
(22, 20, 1);

-- --------------------------------------------------------

--
-- テーブルの構造 `question`
--

CREATE TABLE `question` (
  `question_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `text` text NOT NULL,
  `tag` varchar(255) NOT NULL,
  `image_filename` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- テーブルのデータのダンプ `question`
--

INSERT INTO `question` (`question_id`, `user_id`, `text`, `tag`, `image_filename`, `created_at`, `updated_at`) VALUES
(26, 17, '初めまして！\r\n今回私が作成しているC#のアプリケーションなのですが、テキストファイルに保存したデータをリストボックスに表示させたいです。', 'なし', NULL, '2024-05-22 02:04:31', '2024-05-22 02:04:31'),
(27, 18, 'DockerでLAMP環境を構築し、マイページから画像を変更させその画像をvolumeに保存し、元になった画像を削除したい。', 'なし', NULL, '2024-05-22 02:40:57', '2024-05-22 02:40:57'),
(29, 20, 'C#初心者です。\r\nC#の基本データ型を5つ挙げてください。', 'なし', NULL, '2024-05-23 00:43:55', '2024-05-23 00:43:55'),
(30, 24, 'PHPで質問投稿サイトを作成しているのですが\r\n質問内で<h1>と</h1>でくくった時に文字が大きくなってしまいます。\r\nどうすれば回避出来ますか？？？', 'なし', NULL, '2024-05-23 01:26:19', '2024-05-23 01:27:04');

-- --------------------------------------------------------

--
-- テーブルの構造 `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `email` varchar(255) DEFAULT '',
  `name` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `icon_filename` varchar(255) DEFAULT 'defaulticon.png',
  `point` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- テーブルのデータのダンプ `users`
--

INSERT INTO `users` (`user_id`, `email`, `name`, `password`, `icon_filename`, `point`) VALUES
(17, 'kobe@gmail.com', '神戸太郎', '$2y$10$JWFbzSxepR/x9HlHtFCHHePKTRN1GY6Y0vCgfprYj4b.3c8.3U/Ci', '171642426417鳩.png', 0),
(18, 'nakai@gmail.com', '中井', '$2y$10$7oO2kd8dfGjEVyaNnresOOzZYR2zUgKWi7dqRDK8ch1vwMVZ.G3Lq', 'defaulticon.png', 0),
(19, 'masako@gmail.com', '神戸まさこ', '$2y$10$BFchOKZBFtiMGTNSZYBroO4vU/qFUlSsHpYOrhra3JYSrxjsiMiBG', 'otya.jpg', 2),
(20, 'kyuri0141@gmail.com', '神戸河童', '$2y$10$mvI/yw0gYWkPTBunltOiBefuZ3Es63XaCQRekeSThUqmpwnB18sWK', '171642492720きゅうり.jpg', 0),
(21, 'aho@gmail.com', '神戸駄長', '$2y$10$xzqkqkn50SIjATofw0vKGu9ShA0EDesm.OlUV6i/Bb.bNBnaxkgX6', '171642513121ダチョウ.jpg', 0),
(22, 'nagano@gmail.com', '長野太郎', '$2y$10$mt386OOINNtfp2TZvWxFieYcQdGTwMPSlO5Gc.6Vokfv1x5uVj7YS', '171642536722長野県.jpg', 0),
(23, 'niwaniwaniwaniwatori@gmail.com', '鳥野仁和子', '$2y$10$iJh3.RPgsV8YdgFjm4Dxwu6gxhPgljgYfYWMgHmpdAYn.gk7zJK86', '171642589423ニワトリjpg.jpg', 0),
(24, 'zinkou@suii.com', '水位仁子', '$2y$10$vgyXk1/1JOFR3LEbSpL0Z.6JTRt8Tu0C8DotnDwJVfFaKR1hOOd9i', '171642749024人口推移.jpg', 0);

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`answer_id`);

--
-- テーブルのインデックス `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`article_id`);

--
-- テーブルのインデックス `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`) USING BTREE;

--
-- テーブルのインデックス `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`question_id`);

--
-- テーブルのインデックス `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `answers`
--
ALTER TABLE `answers`
  MODIFY `answer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- テーブルの AUTO_INCREMENT `article`
--
ALTER TABLE `article`
  MODIFY `article_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- テーブルの AUTO_INCREMENT `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- テーブルの AUTO_INCREMENT `question`
--
ALTER TABLE `question`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- テーブルの AUTO_INCREMENT `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
