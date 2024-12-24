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
            <li class="a">
                <a href="http://localhost/regist/index.html">トップ</a>
            </li>
            <li>プロフィール</li>
            <li>D.I.Blogについて</li>
            <li>登録フォーム</li>
            <li>問い合わせ</li>
            <li>その他</li>
            <li>アカウント登録</li>
        </ul>

    </header>

    <h1>アカウント一覧画面</h1><br>

    <main>
        <?php

        try {
            // PDOでデータベースに接続
            $pdo = new PDO("mysql:host=localhost;dbname=lesson01;charset=utf8", "mkuser", "mysql");
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // SQLクエリの準備と実行
            $query = "SELECT id,family_name,last_name,family_name_kana,last_name_kana,mail,password,gender,postal_code,prefecture,address_1,address_2,authority,delete_flag,registered_time,update_time FROM account";
            $stmt = $pdo->prepare($query);
            $stmt->execute();

            // テーブルの開始
            echo "<table border='1'>";
            echo "<tr><th>id</th><th>family_name</th><th>last_name</th><th>family_name_kana</th><th>last_name_kana</th><th>mail</th><th>password</th><th>gender</th><th>postal_code</th><th>prefecture</th><th>address_1</th><th>address_2</th><th>authority</th><th>delete_flag</th><th>registered_time</th><th>update_time</th></tr>"; // テーブルヘッダーの設定

            // 結果の各行をループで処理
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>";
                foreach ($row as $cell) {
                    echo "<td>" . htmlspecialchars($cell) . "</td>";
                }
                echo "</tr>";
            }

            // テーブルの終了
            echo "</table>";
        } catch (PDOException $e) {
            echo "データベース接続エラー: " . $e->getMessage();
        }

        // PDO接続を閉じる
        $pdo = null;
        ?>

    </main>

    <footer>
        Copyright D.I.works| D.I.blog is the one which provides A to Z about programming
    </footer>

</body>

</html>