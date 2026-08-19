<?php

/* オブジェクト指向とは

プログラムで扱う対象を、モノ（オブジェクト）に見立てて
オブジェクトを中心にコードを組み立てていく手法、概念

ある機能をオブジェクトとすると
・その機能で扱うデータ（変数・定数）
・データを操作するための処理（関数）
をまとめて管理でき、実装にはクラスライブラリ（PHPの場合）を用いる
*/

// クラスとはオブジェクトの設計図であり、
// その設計図を基にオブジェクト（インスタンス）を作る

// クラス定義
class Hoge{
    public static $yaa = 'やー！';
    public $var;
    function sayHoge() { print "言うぞ！{$this?->var}！！"; }
}

// クラスプロパティ（静的プロパティ）呼び出し：インスタンスを作らずに呼び出し可能
print Hoge::$yaa;

// インスタンス化（Hogeオブジェクト生成）
$hoge = new Hoge();

// プロパティ呼び出し・値を格納
print $hoge -> var = 'バー';

// メソッド呼び出し
$hoge->sayHoge();

/*
DateTimeクラス
*/

// PHP Fatal Error の原因と解決方法
// 1
// 2
// 3
// PHPのFatal Errorは、プログラムの実行が停止するほど重大なエラーです。主な原因として、未定義の関数呼び出しや関数の二重定義などが挙げられます。

// 例: 未定義の関数を呼び出した場合

// <?php
// function hello() {
// echo "こんにちは";
// }
// hell(); // 関数名のスペルミス
// 
// コピー
// エラー内容:

// Fatal error: Uncaught Error: Call to undefined function hell() in test.php on line 5
// コピー
// 主な原因

// 未定義の関数やクラスを呼び出す 存在しない関数やクラスを呼び出すと発生します。

// 関数やクラスの二重定義 同じ名前で複数回定義するとエラーになります。

// function sample() {
// return true;
// }
// function sample() { // 二重定義
// return false;
// }
// コピー
// ファイルの読み込み失敗 requireやincludeで存在しないファイルを読み込もうとすると発生します。

// 解決方法

// エラーメッセージを確認する エラーメッセージには、問題箇所や原因が記載されています。該当行を確認し修正してください。

// 関数やクラスの名前を確認する スペルミスや二重定義がないか確認します。

// エラーログを活用する register_shutdown_functionを使用してエラー内容をログに記録できます。

// register_shutdown_function(function() {
// $error = error_get_last();
// if ($error) {
// file_put_contents('error_log.txt', print_r($error, true), FILE_APPEND);
// }
// });
// コピー
// try-catchで例外処理を行う PHP 7以降では、Throwableを使用してFatal Errorもキャッチ可能です。

// try {
// // エラーが発生する可能性のある処理
// $test = new UndefinedClass();
// } catch (Throwable $e) {
// echo "エラー: " . $e->getMessage();
// }
// コピー
// これらの方法で、PHP Fatal Errorを特定し、適切に対処できます。
