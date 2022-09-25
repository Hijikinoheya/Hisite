<!DOCTYPE html>

<html>

  <head>

    <meta charset="utf-8">

   <title>Loading...</title>


 </head>

<?php
/*
$count1 = 0;
$sum = 0;

while ($count1 < 1000){    // continueが実行された時に処理が移る位置
  $count1 += 1;

  $count2 = 0;

  while ($count2 < 1000){
    $count2 += 1;
    if ($count1 * $count2 > 300000){
      continue 2;
    }

    $sum += $count1 * $count2;
  }
}
echo 'Loading...';
if($sum = 100000){
  header("Location: index.php");
}; 
//header("Location: index.php");
*/
?>

<?php 
sleep(mt_rand(3, 7));
header("Location: ../index.php");
?>
