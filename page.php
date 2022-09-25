<!DOCTYPE html>

<html>

  <head>

    <meta charset="utf-8">

   <title>Loading...</title>

    <link href="./css/style.css" rel="stylesheet">

 </head>

  <body>
<!--
    <div class="backdrop">
-->
      <div class="spinner"></div>

    </div>

  </body>
  <form action="index.php">
<button>Back to index.php</button>
</form>
<h1 align=center><b>ページの読み込みにエラーが発生しました。</b></h1>
</html>

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
$count = 1;
$sum = 0;

while ($count <= 10000000000000){
  $sum += $count;

  if ($sum > 1000000000000000){
    echo '<form action="index.php">';
    echo '<button>Back to index.php</button>';
    echo '</form>';
    break;
  }

  $count += 1;
}
?>
