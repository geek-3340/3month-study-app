<?php
require_once './pdo.php';
require_once './Encode.php';
?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHPの学習</title>
</head>

<body>
  <a href="./study/09_01/form.php">記事投稿</a>
  <br>
  <table>
    <thead>
      <tr>
        <th>タイトル</th><th>本文</th>
      </tr>
    </thead>
    <tbody>
      <?php
        $db=getDb();
        $stt=$db->query('');
      ?>
      <tr>
        <td></td>
        <td></td>
      </tr>
    </tbody>
  </table>
</body>

</html>