<?php
function getDb(): PDO
{
    $dsn = 'mysql:dbname=study; host=127.0.0.1; charset=utf8';
    $usr = 'studyuser';
    $passwd = 'btm-1101';

    $db = new PDO($dsn, $usr, $passwd);
    // $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // $db = new PDO($dsn, $usr, $passwd, [PDO::ATTR_PERSISTENT => true]);
    return $db;
}
