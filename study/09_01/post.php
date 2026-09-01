<?php
require_once "./study/08_31/pdo.php";

// データのINSERT
try {
    $db=getDb();
    $stt=$db->prepare('INSERT INTO user(name,mail,password,created_at) VALUES(:name,:mail,:password,:created_at)');
    $stt->bindValue(':name',$_POST['name']);
    $stt->bindValue(':mail',$_POST['mail']);
    $stt->bindValue(':password',$_POST['password']);
    $stt->bindValue(':created_at',$_POST['何が入るか確認']);
    $stt->execute();
    header('Location: http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['STUDY_APP']).'form.php');
} catch (PDOException $e) {
    die("$e->getMessage()");
}