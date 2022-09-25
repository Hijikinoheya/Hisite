<title>HisakiSite</title>
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
<h5 align=right>Hello!<?= $record['nickname'] ?></h5>

<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">MailAdress</th>
        <th scope="col">Github</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row">1</th>
        <td>Hisaki</td>
        <td>hisaki714@yahoo.co.jp</td>
        <td><a href="https://github.com/Hisaki714">GithubPage</a></td>
      </tr>
    </tbody>
  </table>
  <?php

$counter_file = 'counter.txt';
$counter_lenght = 8;

$fp = fopen($counter_file, 'r+');

if ($fp){
    if (flock($fp, LOCK_EX)){

        $counter = fgets($fp, $counter_lenght);
        $counter++;

        rewind($fp);

        if (fwrite($fp,  $counter) === FALSE){
            print('ファイル書き込みに失敗しました');
        }

        flock($fp, LOCK_UN);
    }
}

fclose($fp);

$format = '%0'.$counter_lenght.'d';
$new_counter = sprintf($format, $counter);

for ($i = 0 ; $i <= 9 ; $i++){
    $num = (string)$i;
    $img_num = '<img src="./img/b'.$i.'.png">';
    $new_counter = str_replace($num, $img_num, $new_counter);
}

$size = ' width="16" height="18" border="0">';
$new_counter = str_replace('>', $size, $new_counter);

print('このページを見た回数:'.$new_counter.'回');

?>
<br>
  <a href="login.php">Login</a>
  <a href="logout.php">Logout</a><br>
  <a href="mypage.php">Mypage</a><br>
  <a href="register.html">Have No Acount?Register</a>
  <a href="bord.php">展示版テスト</a>
  <a href="./hfsample/index.html">テスト</a><br>
  <a href="./swith/index.html">カチカチ遊ぶ</a>
  <a href="./timer/index.html">3分大麻ー（タイマーです。）</a>
  <a href="./omikuji/index.html">占う。</a>
  <a href="./chat/index.html">LocalNetworkでチャット</a>
  <br>
  <!-- <a href="counter3.php">こうもんしゃ</a> -->
  <a href="page.php">StaffPage</a><br>
  <a href="reload.php">強制リロード(3秒ほどの時間がかかります。)</a><br>
  <?php
  //include('./HF/footer.php'); 
  ?>
  