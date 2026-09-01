<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <title>form</title>
</head>

<body>
    <form action="./post.php">
        <div>
            <label>
                name<br>
                <input type="text" name="name" required>
            </label>
        </div>
        <div>
            <label>
                mail<br>
                <input type="text" name="mail" required>
            </label>
        </div>
        <div>
            <label>
                password<br>
                <input type="password" name="password" required>
            </label>
        </div>
        <br>
        <button type="submit">登録</button>
    </form>
</body>

</html>