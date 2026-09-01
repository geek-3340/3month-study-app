<?php
require_once "./study/08_31/pdo.php";

try {
    $db=getDb();
} catch (\Throwable $th) {
    //throw $th;
}