<?php
// データベース抽象化レイヤー
/*
様々なRDB（MySQL・PostgreSQL・OracleDBなど）への接続をする上で
共通の命令をRDB応じて良しなに変換してくれる
*/

// PDO(PHP Data Objects)
/*
PHPのデータベース抽象化レイヤー
*/

// DB接続の確立
require_once './study/08_29/DbManager.php';

try {
    getDb();
    print 'success!!!';
} catch (PDOException $e) {
    die("not access：{$e->getMessage()}");
} finally {
    $db = null;
}
