<?php
// var_dump($_POST);
// exit();
include('functions.php');

$nickname = $_POST["nickname"];
$email = $_POST["email"];
$password = $_POST["password"];

$pdo = connect_to_db();
$sql =
    'SELECT COUNT(*) FROM user WHERE nickname=:nickname AND mail_adress=:email	AND password=:password';
// var_dump($sql);
// exit();

$stmt = $pdo->prepare($sql);
// var_dump($stmt);
// exit();
$stmt->bindValue(':nickname', $nickname, PDO::PARAM_STR);
$stmt->bindValue(':email', $email, PDO::PARAM_STR);
$stmt->bindValue(':password', $password, PDO::PARAM_STR);
$status = $stmt->execute();
// var_dump($status);
// exit();

if ($status == false) {
    $error = $stmt->errorInfo();
    echo json_encode(["error_msg" => "{$error[2]}"]);
    exit();
}

if ($stmt->fetchColumn() > 0) {
    echo "<p>すでに登録されているユーザです．</p>";
    echo '<a href="login.php">ログイン</a>';
    exit();
}
$sql = "INSERT INTO user (nickname,mail_adress,password) VALUES (:nickname,:email,:password)";
//var_dump($password);
//exit();
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':nickname', $nickname, PDO::PARAM_STR);
$stmt->bindValue(':email', $email, PDO::PARAM_STR);
$stmt->bindValue(':password', $password, PDO::PARAM_STR);
$status = $stmt->execute();
// var_dump($status);
// exit();
if ($status == false) {
    $error = $stmt->errorInfo();
    echo json_encode(["error_msg" => "{$error[2]}"]);
    exit();
} else {
    header("Location:registered.php");
    exit();
}
