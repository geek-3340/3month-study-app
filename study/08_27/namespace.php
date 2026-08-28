<?php

namespace study_app\study\namespace;

use study_app\study\MyClass\MyClass;

require_once 'Autoloader.php';

print MyClass::showClass();

// 名前空間
/*
クラス名・関数名・定数名などの競合を防ぐ

namespace ~\~\~で宣言（数字始まりは✕）
ファイルの先頭で定義（<?phpの真下：スペースや改行もだめ）

インポート：別ファイルの名前空間を参照する場合use ~\~のように書く（namespaceの直下又はグローバルスコープ）

require_onceは別で必要

名前は慣習的にディレクトリ階層に準ずること
*/