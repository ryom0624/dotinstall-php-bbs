<?php

$dataFile = 'bbs.dat';

if ($_SERVER['REQUEST_METHOD'] == 'POST' &&
  isset($_POST['message']) &&
  isset($_POST['user'])) {

  $message = trim($_POST['message']);
  $user = trim($_POST['user']);


  if ($message !== '') {

    $user = ($user === '') ? 'ななしさん' : $user;

    $newData = $message . "\t" . $user . "\n";

    $fp = fopen($dataFile, 'a');
    fwrite($fp, $newData);
    fclose($fp);
  }

}

?>


<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>簡易掲示板</title>
</head>
<body>
  <h1>簡易掲示板</h1>
  <form action="" method="post">
    message : <input type="text" name="message">
    user : <input type="text" name="user">
    <input type="submit" value="投稿">
  </form>
  <h2>投稿一覧 (0件) </h2>
  <ul>
    <li>まだ投稿はありません。</li>
  </ul>
</body>
</html>
