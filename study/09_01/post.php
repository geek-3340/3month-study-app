<?php
require_once '../../pdo.php';
require_once '../../Encode.php';

// データのINSERT
try {

    // データベースへの接続を確立
    $db = getDb();

    // prepare()：SQL命令をプレースホルダー（:name）付きでセット・・・PDOStatementオブジェクト取得
    // プレースホルダーを？にする
    $stt = $db->prepare('INSERT INTO post(title,article) VALUES(:title,:article)');

    // bindValue()：PDOStatementオブジェクトのプレースホルダーに値をセット
    // $_POST：ブラウザからのフォーム内容を取得する
    $stt->bindValue(':title', e($_POST['title']));
    $stt->bindValue(':article', e($_POST['article']));

    // execute()：SQL命令を実行する
    $stt->execute();

    // header('Location: http://'~)：リダイレクト処理
    // $_SERVER['HTTP_HOST']：リクエストヘッダーからURLのホスト名を取得
    // $_SERVER['PHP_SELF']：リクエストヘッダーからURLのパスを取得
    // dirname()：引数のパスからディレクトリ名を取得
    header('Location: http://' . $_SERVER['HTTP_HOST'] . '/study_app/index.php');

    // $stt->rowCount()：SQL命令によって影響をうけたレコード数を取得

} catch (PDOException $e) {
    die("{$e->getMessage()}");
}
