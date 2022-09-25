<?php
// var_dump($_GET);
// exit();
session_start();
include('functions.php');
check_session_id();

$id = $_SESSION['id'];
// var_dump($user_id);
// exit();
$pdo = connect_to_db();

$sql = 'SELECT * FROM user WHERE id=:id';
// var_dump($sql);
// exit();
$stmt = $pdo->prepare($sql);
// var_dump($stmt);
// exit();
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

if ($status == false) {
    // SQL実行に失敗した場合はここでエラーを出力し，以降の処理を中止する
    $error = $stmt->errorInfo();
    echo json_encode(["error_msg" => "{$error[2]}"]);
    exit();
} else {
    // 正常にSQLが実行された場合は指定の11レコードを取得
    // fetch()関数でSQLで取得したレコードを取得できる
    $record = $stmt->fetch(PDO::FETCH_ASSOC);
}
// var_dump($record);
// exit();
?>
<title>Mypage</title>
<h1>User_id=<mark><?= $record['id'] ?></mark></h1>
<h1>Nickname=<mark><?= $record['nickname'] ?></mark></h1>
<h1>MailAdress=<mark><?= $record['mail_adress'] ?></mark></h1>
<h1>Password=<mark><?= $record['password'] ?></mark></h1>
<a href="index.php"><h4>Back</h4></a><a href="logout.php">Logout</a><br><p>
<form action="deluser.php" method="post">
    <input type="hidden" name="id" value="<?= $id?>">
    <a href="deluser.php">Delete This Acount.</a></p>
</form>    
<a href="./dbinfo/info3.html">ユーザー情報一覧</a>
