<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <title>form</title>
</head>

<body>
    <form action="./post.php" method="POST">
        <div>
            <label>
                タイトル<br>
                <input type="text" name="title" required>
            </label>
        </div>
        <div>
            <label>
                本文<br>
                <textarea name="article"></textarea>
            </label>
        </div>
        <button type="submit">登録</button>
    </form>
    <br>
    <a href="../../index.php">記事一覧へ</a>
</body>

</html>