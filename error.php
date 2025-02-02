<?php
session_start();

$authority = $_SESSION['authority'];
$error = $_SESSION['error'];

mb_internal_encoding("UTF-8");

if ($authority == 1) {

    $class = "";

    switch ($error) {

        case "regist_error":
            $msg = "エラーが発生したためアカウント登録できません。";
            break;

        case "update_error":
            $msg = "エラーが発生したためアカウント更新できません。";
            break;

        case "delete_error":
            $msg = "エラーが発生したためアカウント削除できません。";
            break;

        default:
            $msg = "エラーが発生しました。";
    }
} else {
    $class = "hide";
    $msg = "操作できません。アカウント権限を確認してください。";
}
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>error</title>
    <link rel="stylesheet" type="text/css" href="error.css" />
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
            <li class="<?PHP echo $class; ?>">
                <a href="http://localhost/regist/regist.php">アカウント登録</a>
            </li>
            <li class="<?PHP echo $class; ?>">
                <a href="http://localhost/regist/list.php">アカウント一覧</a>
            </li>
        </ul>

    </header>

    <main>
        <form action="http://localhost/regist/home.php">

            <div class="error">
                <p><?php echo $msg; ?></p>
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