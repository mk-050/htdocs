<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>account</title>
    <link rel="stylesheet" type="text/css" href="regist2.css" />
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

    <h1>アカウント登録確認画面</h1><br>

    <main>
        <div class="main-container">

            <div class="accountA">
                <div class="account">

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
                        <?php echo $_POST['mail']; ?>
                    </div><br>

                    <div><label class="conform3">パスワード</label>
                        <?php if (!empty($_POST['password'])) {
                            $i = 1;
                            while ($i <= strlen($_POST['password'])) {
                                echo "●";
                                $i++;
                            }
                        } ?>
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
                        <?php echo $_POST['address_2']; ?>

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
                </div>
                <div style="display:inline-flex">
                    <form method="post" action="regist.php">
                        <input type="submit" class="submit" value="前に戻る">
                        <input type="hidden" value="<?php echo $_POST['familyName']; ?>" name="familyName">
                        <input type="hidden" value="<?php echo $_POST['givenName']; ?>" name="givenName">
                        <input type="hidden" value="<?php echo $_POST['familyName_kana']; ?>" name="familyName_kana">
                        <input type="hidden" value="<?php echo $_POST['givenName_kana']; ?>" name="givenName_kana">
                        <input type="hidden" value="<?php echo $_POST['mail']; ?>" name="mail">
                        <input type="hidden" value="<?php echo $_POST['password']; ?>" name="password">
                        <input type="hidden" value="<?php echo $_POST['radio']; ?>" name="radio">
                        <input type="hidden" value="<?php echo $_POST['postalCode']; ?>" name="postalCode">
                        <input type="hidden" value="<?php echo $_POST['prefecture']; ?>" name="prefecture">
                        <input type="hidden" value="<?php echo $_POST['address_1']; ?>" name="address_1">
                        <input type="hidden" value="<?php echo $_POST['address_2']; ?>" name="address_2">
                        <input type="hidden" value="<?php echo $_POST['privilege']; ?>" name="privilege">
                    </form>

                    <form method="post" action="regist_complete.php">
                        <input type="submit" class="submit" value="登録する">
                        <input type="hidden" value="<?php echo $_POST['familyName']; ?>" name="familyName">
                        <input type="hidden" value="<?php echo $_POST['givenName']; ?>" name="givenName">
                        <input type="hidden" value="<?php echo $_POST['familyName_kana']; ?>" name="familyName_kana">
                        <input type="hidden" value="<?php echo $_POST['givenName_kana']; ?>" name="givenName_kana">
                        <input type="hidden" value="<?php echo $_POST['mail']; ?>" name="mail">
                        <input type="hidden" value="<?php echo $_POST['password']; ?>" name="password">
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