<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>account</title>
    <link rel="stylesheet" type="text/css" href="regist2.css" </head>

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

    <h1>アカウント登録確認画面</h1><br>

    <main>
        <div class="main-container">

            <form>
                <div class="account">

                    <div><label>名前（姓）</label>
                        <?php echo $_POST['familyName']; ?>
                    </div><br>

                    <div><label>名前（名）</label>
                        <?php echo $_POST['givenName']; ?>
                    </div><br>

                    <div><label>カナ（姓）</label>
                        <?php echo $_POST['familyName_kana']; ?>
                    </div><br>

                    <div><label>カナ（名）</label>
                        <?php echo $_POST['givenName_kana']; ?>
                    </div><br>

                    <div><label>メールアドレス</label>
                        <?php echo $_POST['mail']; ?>
                    </div><br>

                    <div><label>パスワード</label>
                        <?php echo $_POST['password']; ?>
                    </div><br>

                    <div><label>性別</label>
                        <?php 
                        if (isset($_POST["radio"])) {

                            //ラジオボタンで選択された値を受け取る
                            $radio = $_POST['radio'];

                            //受け取った値を画面に出力
                            echo $radio;
                        } ?>
                    </div><br>

                    <div><label>郵便番号</label>
                    <?php echo $_POST['postalCode']; ?>

                    </div><br>

                    <div><label>住所（都道府県）</label>
                    <?php 
                        if (isset($_POST["prefecture"])) {

                            //ラジオボタンで選択された値を受け取る
                            $prefecture = $_POST['prefecture'];

                            //受け取った値を画面に出力
                            echo $prefecture;
                        } ?>

                    </div><br>

                    <div><label>住所（市区町村）</label>
                    <?php echo $_POST['address_1']; ?>

                    </div><br>

                    <div><label>住所（番地）</label>
                    <?php echo $_POST['address_2']; ?>

                    </div><br>

                    <div><label>アカウント権限</label>
                    <?php 
                        if (isset($_POST["privilege"])) {

                            //ラジオボタンで選択された値を受け取る
                            $privilege = $_POST['privilege'];

                            //受け取った値を画面に出力
                            echo $privilege;
                        } ?>

                    </div><br>
                </div>

                <input type="submit" class="submit" value="前に戻る">
                <input type="submit" class="submit" value="登録する">

            </form>
        </div>




    </main>

    <footer>
        Copyright D.I.works| D.I.blog is the one which provides A to Z about programming
    </footer>

</body>

</html>