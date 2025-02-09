<?php
session_start();

$authority = $_SESSION['authority'];
$family_name = $_SESSION['family_name'];

if (isset($_SESSION['authority']) && $authority == 1) {

    $class = "";

    $msg = 'こんにちは' . htmlspecialchars($family_name, \ENT_QUOTES, 'UTF-8') . 'さん';
    $link = '<a href="logout.php" id="link">[ログアウトする]</a>';
} else if (isset($_SESSION['authority']) && $authority == 0) {

    $class = "hide";

    $msg = 'こんにちは' . htmlspecialchars($family_name, \ENT_QUOTES, 'UTF-8') . 'さん';
    $link = '<a href="logout.php" id="link">[ログアウトする]</a>';
} else {
    header('Location:http://localhost/regist/login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>D.I.BLOG</title>
    <link rel="stylesheet" type="text/css" href="home.css" />
    <style>
        .hide {
            display: none;
        }
    </style>
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
            <li class="<?PHP echo $class; ?>">
                <a href="http://localhost/regist/regist.php">アカウント登録</a>
            </li>
            <li class="<?PHP echo $class; ?>">
                <a href="http://localhost/regist/list.php">アカウント一覧</a>
            </li>
        </ul>

    </header>


    <main>
        <div class="main-container">

            <div class="left">

                <h1>プログラミングに役立つ書籍</h1>
                <H4><?php echo $msg; ?></H4>
                <div class="img1">
                    <img src="bookstore.jpg">
                </div>

                <h2>D.I.BlogはD.I.Worksが提供する演習課題です。</h2>
                <h2>記事中身</h2>

                <div class="gray-box">

                    <div class="picture">
                        <img src="pic1.jpg">
                        <P>ドメイン取得方法</P>
                    </div>

                    <div class="picture">
                        <img src="pic2.jpg">
                        <p>快適な職場環境</p>
                    </div>

                    <div class="picture">
                        <img src="pic3.jpg">
                        <p>Linuxの基礎</p>
                    </div>

                    <div class="picture">
                        <img src="pic4.jpg">
                        <p>マーケティング入門</p>
                    </div>

                    <div class="picture">
                        <img src="pic5.jpg">
                        <p>アクティブラーニング</p>
                    </div>

                    <div class="picture">
                        <img src="pic6.jpg">
                        <p>CSSの効率的な勉強方法</p>
                    </div>

                    <div class="picture">
                        <img src="pic7.jpg">
                        <p>リーダブルコードとは</p>
                    </div>

                    <div class="picture">
                        <img src="pic8.jpg">
                        <p>HTML5の可能性</p>
                    </div>

                </div>

            </div>

        </div>
        <div class="right">
            <?php echo $link; ?>

            <h2>人気の記事</h2>

            <ul>

                <li>PHPオススメ本</li>
                <li>PHP MyAdminの使い方</li>
                <li>今人気のエディタ</li>
                <li>HTMLの基礎</li>

            </ul>

            <h2>オススメリンク</h2>

            <ul>

                <li>ﾃﾞｨｰｱｲﾜｰｸｽ株式会社</li>株式会社</li>
                <li>XAMPPのダウンロード</li>
                <li>Eclipseのダウンロード</li>
                <li>Bracketsのダウンロード</li>

            </ul>

            <h2>カテゴリ</h2>

            <ul>

                <li>HTML</li>
                <li>PHP</li>
                <li>MySQL</li>
                <li>JavaScript</li>

            </ul>

        </div>
        </div>

    </main>

    <footer>
        Copyright D.I.works| D.I.blog is the one which provides A to Z about programming
    </footer>

</body>

</html>