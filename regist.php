<?php
session_start();
$authority = $_SESSION['authority'];

if ($_SESSION['authority'] && $authority == 1) {
    $class = "";
    $msg = "";
    $form = "";
} else if ($_SESSION['authority'] && $authority == 0) {
    $class = "hide";
    $msg = "操作できません。アカウント権限を確認してください";
    $form = "do_not_submit";
} else {
    header('Location:http://localhost/regist/login.php');
    exit;
}

?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>Registration</title>
    <link rel="stylesheet" type="text/css" href="regist.css" />

    <script type="text/javascript">
        function check() {

            if (form.familyName.value == "") {
                document.getElementById("num1").innerHTML = "名前（姓）が未入力です。";

            } else {
                document.getElementById("num1").innerHTML = " ";
            }

            if (form.givenName.value == "") {
                document.getElementById("num2").innerHTML = "名前（名）が未入力です。";

            } else {
                document.getElementById("num2").innerHTML = " ";
            }
            if (form.familyName_kana.value == "") {
                document.getElementById("num3").innerHTML = "カナ（姓）が未入力です。";

            } else {
                document.getElementById("num3").innerHTML = " ";
            }
            if (form.givenName_kana.value == "") {
                document.getElementById("num4").innerHTML = "カナ（名）が未入力です。";

            } else {
                document.getElementById("num4").innerHTML = " ";
            }
            if (form.mail.value == "") {
                document.getElementById("num5").innerHTML = "メールアドレスが未入力です。";

            } else {
                document.getElementById("num5").innerHTML = " ";
            }
            if (form.password.value == "") {
                document.getElementById("num6").innerHTML = "パスワードが未入力です。";
            } else {
                document.getElementById("num6").innerHTML = " ";
            }

            if (form.postalCode.value == "") {
                document.getElementById("num7").innerHTML = "郵便番号が未入力です。";
            } else {
                document.getElementById("num7").innerHTML = " ";
            }
            if (form.prefecture.value == "") {
                document.getElementById("num8").innerHTML = "住所（都道府県）が未選択です。";
            } else {
                document.getElementById("num8").innerHTML = " ";
            }
            if (form.address_1.value == "") {
                document.getElementById("num9").innerHTML = "住所（市区町村）が未入力です。";
            } else {
                document.getElementById("num9").innerHTML = " ";
            }
            if (form.address_2.value == "") {
                document.getElementById("num10").innerHTML = "住所（番地）が未入力です。";
            } else {
                document.getElementById("num10").innerHTML = " ";
            }

            if (form.familyName.value == "" || form.givenName.value == "" || form.familyName_kana.value == "" || form.givenName_kana.value == "" || form.mail.value == "" || form.password.value == "" || form.postalCode.value == "" || form.prefecture.value == "" || form.address_1.value == "" || form.address_2.value == "") {
                return false;

            } else {
                return true;
            }
        }
    </script>

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

    <h1>アカウント登録画面 <span class="message"><?PHP echo $msg; ?></span></h1><br>

    <main>
        <div class="main-container">

            <form class="<?PHP echo $form; ?>" method="post" name="form" action="regist_confirm.php" onsubmit="return check()">
                <div><label>名前（姓）</label>
                    <input type="text" class="text" pattern="[\u4E00-\u9FFF\u3040-\u309Fー]*" maxlength="10" name="familyName" value="<?php if (!empty($_POST['familyName'])) {
                                                                                                                                            echo $_POST['familyName'];
                                                                                                                                        } ?>">
                </div>
                <div id="num1" class="error"></div>
                <br>

                <div><label>名前（名）</label>
                    <input type="text" class="text" pattern="[\u4E00-\u9FFF\u3040-\u309Fー]*" maxlength="10" name="givenName" value="<?php if (!empty($_POST['givenName'])) {
                                                                                                                                        echo $_POST['givenName'];
                                                                                                                                    } ?>">
                </div>
                <div id="num2" class="error"></div>
                <br>

                <div><label>カナ（姓）</label>
                    <input type="text" class="text" pattern="[\u30A1-\u30FF]*" maxlength="10" name="familyName_kana" value="<?php if (!empty($_POST['familyName_kana'])) {
                                                                                                                                echo $_POST['familyName_kana'];
                                                                                                                            } ?>">
                </div>
                <div id="num3" class="error"></div>
                <br>

                <div><label>カナ（名）</label>
                    <input type="text" class="text" pattern="[\u30A1-\u30FF]*" maxlength="10" name="givenName_kana" value="<?php if (!empty($_POST['givenName_kana'])) {
                                                                                                                                echo $_POST['givenName_kana'];
                                                                                                                            } ?>">
                </div>
                <div id="num4" class="error"></div>
                <br>

                <div><label>メールアドレス</label>
                    <input type="email" class="text" pattern="[^!#$%&\*,<>~?]+" maxlength="100" name="mail" value="<?php if (!empty($_POST['mail'])) {
                                                                                                                        echo $_POST['mail'];
                                                                                                                    } ?>">
                    <br>
                    <div id="num5" class="error"></div>
                    <br>

                    <div><label>パスワード</label>
                        <input type="text" class="text" pattern="^[a-zA-Z0-9]+$" maxlength="10" name="password" value="<?php if (!empty($_POST['password'])) {
                                                                                                                            echo $_POST['password'];
                                                                                                                        } ?>">
                    </div>
                    <div id="num6" class="error"></div>
                    <br>

                    <div><label>性別</label>
                        <span class="radio">
                            <label><input type="radio" name="radio" value="0" checked <?php if (!empty($_POST['radio']) && $_POST['radio'] == "0") {
                                                                                            echo 'checked';
                                                                                        } ?>>男</label><span class="A"><label><input type="radio" name="radio" value="1" <?php if (!empty($_POST['radio']) && $_POST['radio'] == "1") {
                                                                                                                                                                            echo 'checked';
                                                                                                                                                                        } ?>>女</span></label></span>
                    </div><br>

                    <div><label>郵便番号</label>
                        <input type="text" class="zip" pattern="^[0-9]+$" maxlength="7" name="postalCode" value="<?php if (!empty($_POST['postalCode'])) {
                                                                                                                        echo $_POST['postalCode'];
                                                                                                                    } ?>">
                    </div>
                    <div id="num7" class="error"></div>
                    <br>

                    <div><label>住所（都道府県）</label>
                        <select class="dropdown" name="prefecture">
                            <option value="" selected></option>
                            <option value="北海道" <?php if (!empty($_POST['prefecture']) && $_POST['prefecture'] == "北海道") {
                                                    echo 'selected';
                                                } ?>>北海道</option>
                            <option value="青森県" <?php if (!empty($_POST['prefecture']) && $_POST['prefecture'] == "青森県") {
                                                    echo 'selected';
                                                } ?>>青森県</option>
                            <option value="岩手県" <?php if (!empty($_POST['prefecture']) && $_POST['prefecture'] == "岩手県") {
                                                    echo 'selected';
                                                } ?>>岩手県</option>
                            <option value="宮城県" <?php if (!empty($_POST['prefecture']) && $_POST['prefecture'] == "宮城県") {
                                                    echo 'selected';
                                                } ?>>宮城県</option>
                            <option value="秋田県" <?php if (!empty($_POST['prefecture']) && $_POST['prefecture'] == "秋田県") {
                                                    echo 'selected';
                                                } ?>>秋田県</option>
                            <option value="山形県" <?php if (!empty($_POST['prefecture']) && $_POST['prefecture'] == "山形県") {
                                                    echo 'selected';
                                                } ?>>山形県</option>
                            <option value="福島県" <?php if (!empty($_POST['prefecture']) && $_POST['prefecture'] == "福島県") {
                                                    echo 'selected';
                                                } ?>>福島県</option>
                            <option value="茨城県" <?php if (!empty($_POST['prefecture']) && $_POST['prefecture'] == "茨城県") {
                                                    echo 'selected';
                                                } ?>>茨城県</option>
                            <option value="栃木県" <?php if (!empty($_POST['prefecture']) && $_POST['prefecture'] == "栃木県") {
                                                    echo 'selected';
                                                } ?>>栃木県</option>
                            <option value="群馬県" <?php if (!empty($_POST['prefecture']) && $_POST['prefecture'] == "群馬県") {
                                                    echo 'selected';
                                                } ?>>群馬県</option>
                            <option value="埼玉県" <?php if (!empty($_POST['prefecture']) && $_POST['prefecture'] == "埼玉県") {
                                                    echo 'selected';
                                                } ?>>埼玉県</option>
                            <option value="千葉県" <?php if (!empty($_POST['prefecture']) && $_POST['prefecture'] == "千葉県") {
                                                    echo 'selected';
                                                } ?>>千葉県</option>
                            <option value="東京都" <?php if (!empty($_POST['prefecture']) && $_POST['prefecture'] == "東京都") {
                                                    echo 'selected';
                                                } ?>>東京都</option>
                            <option value="神奈川県" <?php if (!empty($_POST['prefecture']) && $_POST['prefecture'] == "神奈川県") {
                                                        echo 'selected';
                                                    } ?>>神奈川県</option>
                            <option value="新潟県" <?php if (!empty($_POST['prefecture']) && $_POST['prefecture'] == "新潟県") {
                                                    echo 'selected';
                                                } ?>>新潟県</option>
                            <option value="富山県" <?php if (!empty($_POST['prefecture']) && $_POST['prefecture'] == "富山県") {
                                                    echo 'selected';
                                                } ?>>富山県</option>
                            <option value="石川県" <?php if (!empty($_POST['prefecture']) && $_POST['prefecture'] == "石川県") {
                                                    echo 'selected';
                                                } ?>>石川県</option>
                            <option value="福井県" <?php if (!empty($_POST['prefecture']) && $_POST['prefecture'] == "福井県") {
                                                    echo 'selected';
                                                } ?>>福井県</option>
                            <option value="山梨県" <?php if (!empty($_POST['prefecture']) && $_POST['prefecture'] == "山梨県") {
                                                    echo 'selected';
                                                } ?>>山梨県</option>
                            <option value="長野県" <?php if (!empty($_POST['prefecture']) && $_POST['prefecture'] == "長野県") {
                                                    echo 'selected';
                                                } ?>>長野県</option>
                            <option value="岐阜県" <?php if (!empty($_POST['prefecture']) && $_POST['prefecture'] == "岐阜県") {
                                                    echo 'selected';
                                                } ?>>岐阜県</option>
                            <option value="静岡県" <?php if (!empty($_POST['prefecture']) && $_POST['prefecture'] == "静岡県") {
                                                    echo 'selected';
                                                } ?>>静岡県</option>
                            <option value="愛知県" <?php if (!empty($_POST['prefecture']) && $_POST['prefecture'] == "愛知県") {
                                                    echo 'selected';
                                                } ?>>愛知県</option>
                            <option value="三重県" <?php if (!empty($_POST['prefecture']) && $_POST['prefecture'] == "三重県") {
                                                    echo 'selected';
                                                } ?>>三重県</option>
                            <option value="滋賀県" <?php if (!empty($_POST['prefecture']) && $_POST['prefecture'] == "滋賀県") {
                                                    echo 'selected';
                                                } ?>>滋賀県</option>
                            <option value="京都府" <?php if (!empty($_POST['prefecture']) && $_POST['prefecture'] == "京都府") {
                                                    echo 'selected';
                                                } ?>>京都府</option>
                            <option value="大阪府" <?php if (!empty($_POST['prefecture']) && $_POST['prefecture'] == "大阪府") {
                                                    echo 'selected';
                                                } ?>>大阪府</option>
                            <option value="兵庫県" <?php if (!empty($_POST['prefecture']) && $_POST['prefecture'] == "兵庫県") {
                                                    echo 'selected';
                                                } ?>>兵庫県</option>
                            <option value="奈良県" <?php if (!empty($_POST['prefecture']) && $_POST['prefecture'] == "奈良県") {
                                                    echo 'selected';
                                                } ?>>奈良県</option>
                            <option value="和歌山県" <?php if (!empty($_POST['prefecture']) && $_POST['prefecture'] == "和歌山県") {
                                                        echo 'selected';
                                                    } ?>>和歌山県</option>
                            <option value="鳥取県" <?php if (!empty($_POST['prefecture']) && $_POST['prefecture'] == "鳥取県") {
                                                    echo 'selected';
                                                } ?>>鳥取県</option>
                            <option value="島根県" <?php if (!empty($_POST['prefecture']) && $_POST['prefecture'] == "島根県") {
                                                    echo 'selected';
                                                } ?>>島根県</option>
                            <option value="岡山県" <?php if (!empty($_POST['prefecture']) && $_POST['prefecture'] == "岡山県") {
                                                    echo 'selected';
                                                } ?>>岡山県</option>
                            <option value="広島県" <?php if (!empty($_POST['prefecture']) && $_POST['prefecture'] == "広島県") {
                                                    echo 'selected';
                                                } ?>>広島県</option>
                            <option value="山口県" <?php if (!empty($_POST['prefecture']) && $_POST['prefecture'] == "山口県") {
                                                    echo 'selected';
                                                } ?>>山口県</option>
                            <option value="徳島県" <?php if (!empty($_POST['prefecture']) && $_POST['prefecture'] == "徳島県") {
                                                    echo 'selected';
                                                } ?>>徳島県</option>
                            <option value="香川県" <?php if (!empty($_POST['prefecture']) && $_POST['prefecture'] == "香川県") {
                                                    echo 'selected';
                                                } ?>>香川県</option>
                            <option value="愛媛県" <?php if (!empty($_POST['prefecture']) && $_POST['prefecture'] == "愛媛県") {
                                                    echo 'selected';
                                                } ?>>愛媛県</option>
                            <option value="高知県" <?php if (!empty($_POST['prefecture']) && $_POST['prefecture'] == "高知県") {
                                                    echo 'selected';
                                                } ?>>高知県</option>
                            <option value="福岡県" <?php if (!empty($_POST['prefecture']) && $_POST['prefecture'] == "福岡県") {
                                                    echo 'selected';
                                                } ?>>福岡県</option>
                            <option value="佐賀県" <?php if (!empty($_POST['prefecture']) && $_POST['prefecture'] == "佐賀県") {
                                                    echo 'selected';
                                                } ?>>佐賀県</option>
                            <option value="長崎県" <?php if (!empty($_POST['prefecture']) && $_POST['prefecture'] == "長崎県") {
                                                    echo 'selected';
                                                } ?>>長崎県</option>
                            <option value="熊本県" <?php if (!empty($_POST['prefecture']) && $_POST['prefecture'] == "熊本県") {
                                                    echo 'selected';
                                                } ?>>熊本県</option>
                            <option value="大分県" <?php if (!empty($_POST['prefecture']) && $_POST['prefecture'] == "大分県") {
                                                    echo 'selected';
                                                } ?>>大分県</option>
                            <option value="宮崎県" <?php if (!empty($_POST['prefecture']) && $_POST['prefecture'] == "宮崎県") {
                                                    echo 'selected';
                                                } ?>>宮崎県</option>
                            <option value="鹿児島県" <?php if (!empty($_POST['prefecture']) && $_POST['prefecture'] == "鹿児島県") {
                                                        echo 'selected';
                                                    } ?>>鹿児島県</option>
                            <option value="沖縄県" <?php if (!empty($_POST['prefecture']) && $_POST['prefecture'] == "沖縄県") {
                                                    echo 'selected';
                                                } ?>>沖縄県</option>
                        </select>

                    </div>
                    <div id="num8" class="error"></div>
                    <br>

                    <div><label>住所（市区町村）</label>
                        <input type="text" class="text" pattern="[^a-zA-Z!#$%&\*.,<>@~?]+" maxlength="10" name="address_1" value="<?php if (!empty($_POST['address_1'])) {
                                                                                                                                        echo $_POST['address_1'];
                                                                                                                                    } ?>">
                    </div>
                    <div id="num9" class="error"></div>
                    <br>

                    <div><label>住所（番地）</label>
                        <input type="text" class="text" pattern="[^a-zA-Z!#$%&\*.,<>@~?]+" name="address_2" value="<?php if (!empty($_POST['address_2'])) {
                                                                                                                        echo $_POST['address_2'];
                                                                                                                    } ?>">
                    </div>
                    <div id="num10" class="error"></div>
                    <br>

                    <div><label>アカウント権限</label>
                        <select class="privilege" name="privilege">
                            <option value="0" selected <?php if (!empty($_POST['privilege']) && $_POST['privilege'] == "0") {
                                                            echo 'selected';
                                                        } ?>>一般</option>
                            <option value="1" <?php if (!empty($_POST['privilege']) && $_POST['privilege'] == "1") {
                                                    echo 'selected';
                                                } ?>>管理者</option>
                        </select>
                    </div><br>

                    <input type="submit" class="submit" value="確認する">
            </form>

        </div>

    </main>

    <footer>
        Copyright D.I.works| D.I.blog is the one which provides A to Z about programming
    </footer>

</body>

</html>