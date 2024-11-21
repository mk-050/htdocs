<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="regist.css" </head>

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

    アカウント登録画面<br>

    <main>

        名前（姓）<input type="text" pattern="[\u3042-\u309F\u30FC]+" maxlength="10"><br>
        名前（名）<input type="text" pattern="[\u3041-\u3096]*" maxlength="10"><br>
        カナ（姓）<input type="text" pattern="[\u30A1-\u30F6]*" maxlength="10"><br>
        カナ（名）<input type="text" pattern="[\u30A1-\u30F6]*" maxlength="10"><br>
        メールアドレス<input type="text" maxlength="100"><br>
        パスワード<input type="password" maxlength="10"><br>
        性別<input type="radio">男<input type="radio">女<br>
        郵便番号<input type="text" maxlength="7"><br>
        住所（都道府県）<br>
        住所（市区町村）<input type="password" maxlength="10"><br>
        住所（番地）<input type="password" maxlength="100"><br>
        アカウント権限<br>


    </main>

    <footer>
        Copyright D.I.works| D.I.blog is the one which provides A to Z about programming
    </footer>

</body>

</html>