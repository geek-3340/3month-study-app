<?php

// 変数
$msg = 'hello';

// 可変変数（動的に変数を呼び出せる）
$x = 'title';
$title = 'これはタイトルです';

// 定数（２通りの宣言方法）
const FULL_NAME = 'レオン・S・ケネディ';
define('MIDDLE_NAME', 'S');
/*
const：
トップレベルでしか宣言できない（関数や条件分岐内では宣言不可）
値に変数や関数の返り値を入れることが出来ない

define：
クラスの宣言が出来ない
実行速度がやや遅い
*/

// PHPの型
$bool = true;
$int = 10;
$float = 1.5;
$string = '文字列';
$str2 = "これは{$string}です"; // ""展開される
$str3 = 'これは{$string}です'; // ''展開されない
$array = ['a', 'b', 'c'];
class obj
{
    public $NAME = 'サトシ';
}
$object = new obj();
$null = null;

/*
真偽値がfalseとなる値
(int)0
(bool)false
(array)[] ※空配列
(null)null
*/

// ヒアドキュメント
$msg = <<<EOD
これはとてもとても
長い長い
文字列です。
EOD;
