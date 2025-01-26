<?php
mb_internal_encoding("UTF-8");

try {
    $pdo = new PDO("mysql:dbname=lesson01;host=localhost;", "mkuser", "mysql");

    $id = $_POST['id'];
    $family_name = $_POST['familyName'];
    $last_name = $_POST['givenName'];
    $family_name_kana = $_POST['familyName_kana'];
    $givenName_kana = $_POST['givenName_kana'];
    $mail = $_POST['mail'];
    $password = $_POST['password'];

    $radio = $_POST['radio'];
    $int_radio = (int)$radio;

    $postalCode = $_POST['postalCode'];
    $prefecture = $_POST['prefecture'];
    $address_1 = $_POST['address_1'];
    $address_2 = $_POST['address_2'];


    $privilege = $_POST['privilege'];
    $int_privilege = (int)$privilege;

    if (!empty($family_name)) {
        $pdo->exec(
            "update account set family_name='" . $family_name . "'  where id='" . $id . "' "
        );
    }

    if (!empty($last_name)) {
        $pdo->exec(
            "update account set last_name='" . $last_name . "'  where id='" . $id . "' "
        );
    }

    if (!empty($family_name_kana)) {
        $pdo->exec(
            "update account set family_name_kana='" . $family_name_kana . "'  where id='" . $id . "' "
        );
    }

    if (!empty($givenName_kana)) {
        $pdo->exec(
            "update account set last_name_kana='" . $givenName_kana . "'  where id='" . $id . "' "
        );
    }

    if (!empty($mail)) {
        $pdo->exec(
            "update account set mail='" . $mail . "'  where id='" . $id . "' "
        );
    }

    if (!empty($password)) {

        $pdo->exec(
            "update account set password='" . password_hash($_POST['password'], PASSWORD_DEFAULT) . "'  where id='" . $id . "' "
        );
    }

    if (isset($radio)) {
        $pdo->exec(
            "update account set gender='" . $int_radio . "'  where id='" . $id . "' "
        );
    }

    if (!empty($postalCode)) {
        $pdo->exec(
            "update account set postal_code='" . $postalCode . "'  where id='" . $id . "' "
        );
    }

    if (!empty($prefecture)) {
        $pdo->exec(
            "update account set prefecture='" . $prefecture . "'  where id='" . $id . "' "
        );
    }

    if (!empty($address_1)) {
        $pdo->exec(
            "update account set address_1='" . $address_1 . "'  where id='" . $id . "' "
        );
    }

    if (!empty($address_2)) {
        $pdo->exec(
            "update account set address_2='" . $address_2 . "'  where id='" . $id . "' "
        );
    }

    if (isset($privilege)) {
        $pdo->exec(
            "update account set authority='" . $int_privilege . "'  where id='" . $id . "' "
        );
    }

    //データベース切断
    $pdo = null;
} catch (PDOException $e) {
    header('Location:http://localhost/regist/update_error.php');
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

    <h1>アカウント更新完了画面</h1><br>

    <main>
        <form action="http://localhost/regist/home.php">

            <div class="complete">
                <p>更新完了しました</p>
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