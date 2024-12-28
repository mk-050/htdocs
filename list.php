<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>account</title>
    <link rel="stylesheet" type="text/css" href="regist4.css" />
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
            <li>アカウント一覧</li>
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
            $query = "SELECT id,family_name,last_name,family_name_kana,last_name_kana,mail,gender,authority,delete_flag,registered_time,update_time FROM account ORDER BY id DESC";
            $stmt = $pdo->prepare($query);
            $stmt->execute();

            // テーブルの開始
            echo "<table border='1' class='table'>";
            echo "<tr><th>id</th><th>名前（姓）</th><th>名前（名）</th><th>カナ（姓）</th><th>カナ（名）</th><th>メールアドレス</th><th>性別</th><th>アカウント権限</th><th>削除フラグ</th><th>登録日時</th><th>更新日時</th><th colspan='2'>操作</th></tr>"; // テーブルヘッダーの設定


            // 結果の各行をループで処理
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>";

                $id = $row['id'];
                $family_name = $row['family_name'];
                $last_name = $row['last_name'];
                $family_name_kana = $row['family_name_kana'];
                $last_name_kana = $row['last_name_kana'];
                $mail = $row['mail'];

                $param = $row['gender'];
                if ($param == "0") {
                    $gender = "男";
                } elseif ($param == "1") {
                    $gender = "女";
                }

                $param1 = $row['authority'];
                if ($param1 == "0") {
                    $privilege = "一般";
                } elseif ($param1 == "1") {
                    $privilege = "管理者";
                }

                $param2 = $row['delete_flag'];
                if ($param2 == "0") {
                    $delete_flag = "有効";
                } elseif ($param2 == "1") {
                    $delete_flag = "無効";
                }

                $registered_time = $row['registered_time'];
                $registered_time = new DateTime($registered_time);
                $formatted_R_time = $registered_time->format('Y/m/d');
                $update_time = $row['update_time'];
                $update_time = new DateTime($update_time);
                $formatted_U_time = $update_time->format('Y/m/d');

                echo "<td class='right'>" . htmlspecialchars($id) . "</td>";
                echo "<td class='right'>" . htmlspecialchars($family_name) . "</td>";
                echo "<td class='right'>" . htmlspecialchars($last_name) . "</td>";
                echo "<td class='right'>" . htmlspecialchars($family_name_kana) . "</td>";
                echo "<td class='right'>" . htmlspecialchars($last_name_kana) . "</td>";
                echo "<td>" . htmlspecialchars($mail) . "</td>";
                echo "<td class='center'>" . htmlspecialchars($gender) . "</td>";
                echo "<td class='center'>" . htmlspecialchars($privilege) . "</td>";
                echo "<td class='center'>" . htmlspecialchars($delete_flag) . "</td>";
                echo "<td class='center'>" . htmlspecialchars($formatted_R_time) . "</td>";
                echo "<td class='center'>" . htmlspecialchars($formatted_U_time) . "</td>";
                echo "<td>" . "<input type='button' style='width:100%' onclick=location.href='http://localhost/regist/delete.php' value='更新'>" . "</td>";
                echo "<td>" . "<input type='button' style='width:100%' onclick=location.href='http://localhost/regist/update.php' value='削除'>" . "</td>";
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