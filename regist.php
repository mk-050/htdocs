<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>account</title>
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

    <h1>アカウント登録画面</h1><br>

    <main>
        <div class="main-container">

            <form>
                <div>名前（姓）<input type="text" pattern="[\u4E00-\u9FFF\u3040-\u309Fー]*" maxlength="10"></div><br>
                <div>名前（名）<input type="text" pattern="[\u4E00-\u9FFF\u3040-\u309Fー]*" maxlength="10"></div><br>
                <div>カナ（姓）<input type="text" pattern="[\u30A1-\u30FF]*" maxlength="10"></div><br>
                <div>カナ（名）<input type="text" pattern="[\u30A1-\u30FF]*" maxlength="10"></div><br>
                <div>メールアドレス<input type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" maxlength="100"></div><br>
                <div>パスワード<input type="password" pattern="^[a-zA-Z0-9]+$" maxlength="10"></div><br>
                <div>性別<input type="radio">男<input type="radio">女</div><br>
                <div>郵便番号<input type="number" maxlength="7"></div><br>
                <div>住所（都道府県）</div><br>
                <div>住所（市区町村）<input type="text" maxlength="10"></div><br>
                <div>住所（番地）<input type="text" maxlength="100"></div><br>
                <div>アカウント権限</div><br>
                <input type="submit" value="確認する">
            </form>
        </div>


    </main>

    <footer>
        Copyright D.I.works| D.I.blog is the one which provides A to Z about programming
    </footer>

</body>

</html>