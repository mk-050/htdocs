<?php
session_start();

if (isset($_SESSION['authority'])) {
    $authority = $_SESSION['authority'];

    if ($authority == 1) {
        $class = "";
        $msg = "";
    } else {
        $class = "hide";
        $msg = "閲覧できません。アカウント権限を確認してください";
    }
} else {
    header('Location:http://localhost/regist/login.php');
    exit;
}

?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>List of user accounts</title>
    <link rel="stylesheet" type="text/css" href="list.css" />
</head>

<body>
    <header>

        <ul>
            <li class="a">
                <a href="http://localhost/regist/home.php">トップ</a>
            </li>
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

    <h1>アカウント一覧画面<span class="message"><?PHP echo $msg; ?></span></h1><br>

    <main>
        <div class="main-container">
            <form method="post" action="http://localhost/regist/list.php">
                <table border="1" class="A">
                    <tr>
                        <th>名前（姓）</th>
                        <td colspan="3"><input type="text" class="text" pattern="[\u4E00-\u9FFF\u3040-\u309Fー]*" maxlength="10" name="familyName" value="<?php if (!empty($_POST['familyName'])) {
                                                                                                                                                                echo $_POST['familyName'];
                                                                                                                                                            } ?>"></td>
                        <th>名前（名）</th>
                        <td colspan="3"><input type="text" class="text" pattern="[\u4E00-\u9FFF\u3040-\u309Fー]*" maxlength="10" name="givenName" value="<?php if (!empty($_POST['givenName'])) {
                                                                                                                                                            echo $_POST['givenName'];
                                                                                                                                                        } ?>"></td>
                    </tr>
                    <tr>
                        <th>カナ（姓）</th>
                        <td colspan="3"><input type="text" class="text" pattern="[\u30A1-\u30FF]*" maxlength="10" name="familyName_kana" value="<?php if (!empty($_POST['familyName_kana'])) {
                                                                                                                                                    echo $_POST['familyName_kana'];
                                                                                                                                                } ?>"></td>

                        <th>カナ（名）</th>
                        <td colspan="3"><input type="text" class="text" pattern="[\u30A1-\u30FF]*" maxlength="10" name="givenName_kana"></td>
                    </tr>
                    <tr>
                        <th>メールアドレス</th>
                        <td colspan="3"><input type="email" class="text" pattern="[^!#$%&\*,<>~?]+" maxlength="100" name="mail"></td>
                        <th>性別</th>
                        <td colspan="3"><span class="radio">
                                <label><input type="radio" class="gender" name="radio" value="0" checked>男</label><span class="A"><label><input type="radio" class="gender" name="radio" value="1">女</span></label></span></td>
                    </tr>
                    <tr>
                        <th>アカウント権限</th>
                        <td colspan="3"><select class="privilege" name="privilege">
                                <option value="0" selected>一般</option>
                                <option value="1">管理者</option>
                            </select></td>
                    </tr>

                </table>
                <input type="submit" class="submitA" name="submit" value="検索">
            </form>


            <?php

            if (isset($_POST['submit']) && $authority == 1) {

                if (isset($_POST['familyName'])) {
                    $familyName = $_POST['familyName'];
                } else {
                    $familyName = "";
                }

                if (isset($_POST['givenName'])) {
                    $givenName = $_POST['givenName'];
                } else {
                    $givenName = "";
                }

                if (isset($_POST['familyName_kana'])) {
                    $familyName_kana = $_POST['familyName_kana'];
                } else {
                    $familyName_kana = "";
                }


                try {
                    // PDOでデータベースに接続
                    $pdo = new PDO("mysql:host=localhost;dbname=lesson01;charset=utf8", "mkuser", "mysql");
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                    // SQLクエリの準備と実行
                    $query = "SELECT * FROM account where family_name LIKE '%$familyName%' and last_name LIKE '%$givenName%' and family_name_kana LIKE '%$familyName_kana%' ORDER BY id DESC";


                    $stmt = $pdo->prepare($query);
                    $stmt->execute();

                    // テーブルの開始
                    echo "<table border='1' class='B'>";
                    echo "<tr><th>ID</th><th>名前（姓）</th><th>名前（名）</th><th>カナ（姓）</th><th>カナ（名）</th><th>メールアドレス</th><th>性別</th><th>アカウント権限</th><th>削除フラグ</th><th>登録日時</th><th>更新日時</th><th colspan='2'>操作</th></tr>"; // テーブルヘッダーの設定


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
                        if ($param == 0) {
                            $gender = "男";
                        } elseif ($param == 1) {
                            $gender = "女";
                        }

                        $param1 = $row['authority'];
                        if ($param1 == 0) {
                            $privilege = "一般";
                        } elseif ($param1 == 1) {
                            $privilege = "管理者";
                        }

                        $param2 = $row['delete_flag'];
                        if ($param2 == 0) {
                            $delete_flag = "有効";
                        } elseif ($param2 == 1) {
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

                        echo "<td>" . "<form action='http://localhost/regist/update.php' method='post'>" . '<input type="submit" class="submit" value="更新">' . "</td>";
                        echo '<input type="hidden" value=' . $row["id"] . ' name="id">';
                        echo '<input type="hidden" value=' . $row["family_name"] . ' name="familyName">';
                        echo '<input type="hidden" value=' . $row["last_name"] . ' name="givenName">';
                        echo '<input type="hidden" value=' . $row["family_name_kana"] . ' name="familyName_kana">';
                        echo '<input type="hidden" value=' . $row["last_name_kana"] . ' name="givenName_kana">';
                        echo '<input type="hidden" value=' . $row["mail"] . ' name="mail">';
                        echo '<input type="hidden" value=' . $row["gender"] . ' name="radio">';
                        echo '<input type="hidden" value=' . $row["postal_code"] . ' name="postalCode">';
                        echo '<input type="hidden" value=' . $row["prefecture"] . ' name="prefecture">';
                        echo '<input type="hidden" value=' . $row["address_1"] . ' name="address_1">';
                        echo '<input type="hidden" value=' . $row["address_2"] . ' name="address_2">';
                        echo '<input type="hidden" value=' . $row["authority"] . ' name="privilege">';
                        echo "</form>";

                        echo "<td>" . "<form action='http://localhost/regist/delete.php' method='post'>" . '<input type="submit" class="submit" value="削除">' . '</td>';
                        echo '<input type="hidden" value=' . $row["id"] . ' name="id">';
                        echo '<input type="hidden" value=' . $row["family_name"] . ' name="familyName">';
                        echo '<input type="hidden" value=' . $row["last_name"] . ' name="givenName">';
                        echo '<input type="hidden" value=' . $row["family_name_kana"] . ' name="familyName_kana">';
                        echo '<input type="hidden" value=' . $row["last_name_kana"] . ' name="givenName_kana">';
                        echo '<input type="hidden" value=' . $row["mail"] . ' name="mail">';
                        echo '<input type="hidden" value=' . $row["gender"] . ' name="radio">';
                        echo '<input type="hidden" value=' . $row["postal_code"] . ' name="postalCode">';
                        echo '<input type="hidden" value=' . $row["prefecture"] . ' name="prefecture">';
                        echo '<input type="hidden" value=' . $row["address_1"] . ' name="address_1">';
                        echo '<input type="hidden" value=' . $row["address_2"] . ' name="address_2">';
                        echo '<input type="hidden" value=' . $row["authority"] . ' name="privilege">';
                        echo "</form>";
                    }

                    // テーブルの終了
                    echo "</table>";
                } catch (PDOException $e) {
                    echo "データベース接続エラー: " . $e->getMessage();
                }

                // PDO接続を閉じる
                $pdo = null;
            } else {
            }
            ?>
        </div>

    </main>

    <footer>
        Copyright D.I.works| D.I.blog is the one which provides A to Z about programming
    </footer>

</body>

</html>