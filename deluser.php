<?php 
session_start();
include('functions.php');
check_session_id();

$id = $_SESSION['id'];
 //var_dump($id);
//exit();
?>
<h1 align=center>確認: 本当にこのユーザーを削除しますか？</h1>
<form action="deluser_act.php" method="post">
<input type="hidden" name="id" value="<?= $id?>">
<a align=center href="deluser_act.php">はい</a>
</form>
<br><a align=center href="mypage.php">いいえ</a>