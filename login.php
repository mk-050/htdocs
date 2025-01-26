<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="login.css" />
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

    <h1>ログイン画面</h1><br>

    <main>
        <form action="http://localhost/regist/home.html">
            <ul class="login">

                <li>
                    <label>メールアドレス</label>
                    <input type="email" class="text" pattern="[^!#$%&\*,<>~?]+" maxlength="100" name="mail">
                </li>

                <li><label>パスワード</label>
                    <input type="password" class="text" size="40" pattern="^[a-zA-Z0-9]+$" maxlength="10" name="password">
                </li>

                <li>
                    <input type="submit" class="submit" value="ログイン">
                </li>
            </ul>
        </form>


    </main>

    <footer>
        Copyright D.I.works| D.I.blog is the one which provides A to Z about programming
    </footer>

</body>

</html>