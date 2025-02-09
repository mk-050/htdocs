<?php
session_start();
$authority = $_SESSION['authority'];

if ($_SESSION['authority'] && $authority == 1) {
    $class = "";
    $msg = "";
    $form = "";
    $account = "";
} else if ($_SESSION['authority'] && $authority == 0) {
    $class = "hide";
    $msg = "操作できません。アカウント権限を確認してください";
    $form = "do_not_submit";
    $account = "do_not_submit";
} else {
    header('Location:http://localhost/regist/login.php');
    exit;
}

?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>account</title>
    <link rel="stylesheet" type="text/css" href="delete.css" />
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

    <h1>アカウント削除画面<span class="message"><?PHP echo $msg; ?></span></h1><br>

    <main>
        <div class="main-container">

            <div class="accountA">
                <div class="<?PHP echo $account; ?>">

                    <div><label class="conform">名前（姓）</label>
                        <?php echo $_POST['familyName']; ?>
                    </div><br>

                    <div><label class="conform">名前（名）</label>
                        <?php echo $_POST['givenName']; ?>
                    </div><br>

                    <div><label class="conform">カナ（姓）</label>
                        <?php echo $_POST['familyName_kana']; ?>
                    </div><br>

                    <div><label class="conform">カナ（名）</label>
                        <?php echo $_POST['givenName_kana']; ?>
                    </div><br>

                    <div><label class="conform2">メールアドレス</label>
                        <div class="box">
                            <div><span class="form"><?php echo $_POST['mail']; ?></span>
                            </div>
                        </div>
                    </div><br>

                    <div><label class="conform3">パスワード</label>
                        <p>※セキュリティのため非表示にしています</p>
                    </div><br>

                    <div><label class="conform4">性別</label>
                        <?php
                        if (isset($_POST["radio"])) {

                            //ラジオボタンで選択された値を受け取る
                            $radio = $_POST['radio'];

                            if ($radio == "0") {
                                echo "男";
                            } elseif ($radio == "1") {
                                echo "女";
                            }
                        } ?>
                    </div><br>

                    <div><label class="conform5">郵便番号</label>
                        <?php echo $_POST['postalCode']; ?>

                    </div><br>

                    <div><label class="conform6">住所（都道府県）</label>
                        <?php
                        if (isset($_POST["prefecture"])) {

                            //ラジオボタンで選択された値を受け取る
                            $prefecture = $_POST['prefecture'];

                            //受け取った値を画面に出力
                            echo $prefecture;
                        } ?>

                    </div><br>

                    <div><label class="conform6">住所（市区町村）</label>
                        <?php echo $_POST['address_1']; ?>

                    </div><br>

                    <div><label class="conform7">住所（番地）</label>
                        <div class="box">
                            <div><span class="form"><?php echo $_POST['address_2']; ?></span>
                            </div>
                        </div>
                    </div><br>

                    <div><label class="conform8">アカウント権限</label>
                        <?php
                        if (isset($_POST["privilege"])) {

                            //ラジオボタンで選択された値を受け取る
                            $privilege = $_POST['privilege'];

                            if ($privilege == "0") {
                                echo "一般";
                            } elseif ($privilege == "1") {
                                echo "管理者";
                            }
                        } ?>

                    </div><br>
                    <?php $_POST['delete_flag'] = 1; ?>
                </div>

                <form class="<?PHP echo $form; ?>" method="post" action="http://localhost/regist/delete_confirm.php">
                    <input type="submit" class="submit" value="確認する">
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
            </div>

        </div>
        </div>

    </main>

    <footer>
        Copyright D.I.works| D.I.blog is the one which provides A to Z about programming
    </footer>

</body>

</html>