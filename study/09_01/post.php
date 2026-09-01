<?php
require_once '../../pdo.php';

// データのINSERT
try {
    $db=getDb();
    $stt=$db->prepare('INSERT INTO post(title,article) VALUES(:title,:article)');
    $stt->bindValue(':title',$_POST['title']);
    $stt->bindValue(':article',$_POST['article']);
    $stt->execute();
    header('Location: http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['STUDY_APP']).'form.php');
} catch (PDOException $e) {
    die("{$e->getMessage()}");
}