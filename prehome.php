<?php
session_start();

try {
    // PDOでデータベースに接続
    $pdo = new PDO("mysql:host=localhost;dbname=lesson01;charset=utf8", "mkuser", "mysql");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $mail = $_POST['mail'];
    $password = $_POST['password'];

    $sql = 'SELECT * FROM account WHERE mail = :mail';
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['mail' => $mail]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {

        $_SESSION['mail'] = $user['mail'];
        $_SESSION['password'] = $user['password'];
        $_SESSION['authority'] = $user['authority'];
        $_SESSION['family_name'] = $user['family_name'];

        header("Location: home.php");
        exit;
    } else {
        $msg = 'ログインできませんでした';
        $link = '<a href="login.php">ログイン</a>';
    }
} catch (PDOException $e) {
    header('Location:http://localhost/regist/login_error.php');
    exit;
}
?>

<h1><?php echo $msg ?></h1>
<h1><?php echo $link ?></h1>