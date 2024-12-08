<?php
mb_internal_encoding("UTF-8");

try {
    $pdo = new PDO("mysql:dbname=lesson01;host=localhost;", "mkuser", "mysql");

    $pdo->exec(
        "insert into account(family_name,last_name,family_name_kana,last_name_kana,mail,password,gender,postal_code,prefecture,address_1,address_2,authority)
values('" . $_POST['familyName'] . "','" . $_POST['givenName'] . "','" . $_POST['familyName_kana'] . "','" . $_POST['givenName_kana'] . "','" . $_POST['mail'] . "','" . password_hash($_POST['password'], PASSWORD_DEFAULT) . "','" . $_POST['radio'] . "','" . $_POST['postalCode'] . "','" . $_POST['prefecture'] . "','" . $_POST['address_1'] . "','" . $_POST['address_2'] . "','" . $_POST['privilege'] . "');"
    );
    //データベース切断
    $pdo = null;
} catch (PDOException $e) {
    header('Location:http://localhost/regist/regist_error.php');
    exit;
}

?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>account</title>
    <link rel="stylesheet" type="text/css" href="regist3.css" />
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
        </ul>

    </header>

    <h1>アカウント登録完了画面</h1><br>

    <main>
        <form action="http://localhost/regist/index.html">

            <div class="complete">
                <p>登録完了しました</p>
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