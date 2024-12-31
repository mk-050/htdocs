<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>account</title>
    <link rel="stylesheet" type="text/css" href="delete_confirm.css" />
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

    <h1>アカウント削除確認画面</h1><br>

    <main>
        <div class="complete">
            <p>本当に削除してよろしいですか？</p>
        </div>

        <form action="delete.php">
            <input type="button" class="submit" onclick="history.back()" value="前に戻る">
        </form>

        <form method="post" action="delete_complete.php">
            <input type="submit" class="submit" value="削除する">
            <input type="hidden" value="<?php echo $_POST['id']; ?>" name="id">
        </form>
    </main>

    <footer>
        Copyright D.I.works| D.I.blog is the one which provides A to Z about programming
    </footer>

</body>

</html>