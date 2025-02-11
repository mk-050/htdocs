<?php

if (empty($_POST['id']) || empty($_POST['mail'])) {
    header('Location:http://localhost/regist/list.php');
} ?>

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

        <div class="main-container">

            <div class="confirm">
                <p>本当に削除してよろしいですか？</p>
            </div>

            <div style="display:inline-flex">

                <form method="post" action="delete.php">
                    <input type="submit" class="submit" value="前に戻る">
                    <input type="hidden" value="<?php echo $_POST['id']; ?>" name="id">
                    <input type="hidden" value="<?php echo $_POST['familyName']; ?>" name="familyName">
                    <input type="hidden" value="<?php echo $_POST['givenName']; ?>" name="givenName">
                    <input type="hidden" value="<?php echo $_POST['familyName_kana']; ?>" name="familyName_kana">
                    <input type="hidden" value="<?php echo $_POST['givenName_kana']; ?>" name="givenName_kana">
                    <input type="hidden" value="<?php echo $_POST['mail']; ?>" name="mail">
                    <input type="hidden" value="<?php echo $_POST['radio']; ?>" name="radio">
                    <input type="hidden" value="<?php echo $_POST['postalCode']; ?>" name="postalCode">
                    <input type="hidden" value="<?php echo $_POST['prefecture']; ?>" name="prefecture">
                    <input type="hidden" value="<?php echo $_POST['address_1']; ?>" name="address_1">
                    <input type="hidden" value="<?php echo $_POST['address_2']; ?>" name="address_2">
                    <input type="hidden" value="<?php echo $_POST['privilege']; ?>" name="privilege">
                </form>

                <form method="post" action="delete_complete.php">
                    <input type="submit" class="submit" value="削除する">
                    <input type="hidden" value="<?php echo $_POST['id']; ?>" name="id">
                </form>

            </div>

        </div>

    </main>

    <footer>
        Copyright D.I.works| D.I.blog is the one which provides A to Z about programming
    </footer>

</body>

</html>