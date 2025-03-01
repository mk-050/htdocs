<?php
session_start();

$authority = $_SESSION['authority'];
mb_internal_encoding("UTF-8");

if (!empty($_POST['id']) && $authority == 1) {
    try {
        $pdo = new PDO("mysql:dbname=lesson01;host=localhost;", "mkuser", "mysql");

        $id = $_POST['id'];

        $pdo->exec(
            "update account set delete_flag=0 where id='" . $id . "' "
        );
        //データベース切断
        $pdo = null;
    } catch (PDOException $e) {
        $_SESSION['error'] = "delete_error";
        header('Location:http://localhost/regist/error.php');
        exit;
    }
} else {
    header('Location:http://localhost/regist/list.php');
    exit;
}

?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>account</title>
    <link rel="stylesheet" type="text/css" href="regist_complete.css" />
</head>

<body>
    <header>

        <ul>
            <li>トップ</li>
            <li>プロフィール</li>
            <li>D.I.Blogについて</li>
            <li>登録フォーム</li>
            <li>問い合わせ</li>
            <li>その他</li>
            <li>アカウント登録</li>
            <li>アカウント一覧</li>
        </ul>

    </header>

    <h1>アカウント削除完了画面</h1><br>

    <main>
        <form action="http://localhost/regist/home.php">

            <div class="complete">
                <p>削除完了しました</p>
            </div>

            <div>
                <input type="submit" class="submit" value="TOPページへ戻る">
            </div>
        </form>

    </main>

    <footer>
        Copyright D.I.works| D.I.blog is the one which provides A to Z about programming
    </footer>

</body>

</html>