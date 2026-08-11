<?php
// 配列の内容を分かりやすく参照できる関数
$arr = ["apple","orange","banana"];
$arr[] = "peach"; // 末尾に値を追加する書き方
print_r($arr);
/*
出力：
Array(
[0] => apple
[1] => orange
[2] => banana
[3] => peach
)
*/

// 連想配列（JSでいうオブジェクトに似てる）
$player = [
    10 => 'Messi',
    11 => 'Neymar',
    7 => 'CR7',
];
dump($player[10]); // 出力：Messi

// 多次元配列
$cell=[
    ['x-1','x-2','x-3'],
    ['y-1','y-2','y-3'],
    ['z-1','z-2','z-3'],
];
dump($cell[1][2]); // 出力：y-3

// 組み合わせもできる
$teamPlayer=[
    'FCB' => [
        10 => 'Messi',
        11 => 'Neymar',
    ],
    'PSG' => [
        7 => 'Mbappe',
        10 => 'Neymar',
    ],
];
dump($teamPlayer['FCB'][11]); // 出力：Neymar

// 型のキャスト
$hoge = (string)15; // string型の15に変換される
$moge = (int)'20'; // int型の20に変換される
/*
他にも以下のようなものがある
(bool) / (boolean)：論理型への変換
(array)：配列型への変換
*/

// 前置演算子と後置演算子（代入前か後かの話）
$x = 2;
$y = ++$x; // xに1足して、yに代入
$y = $x++; // yに代入して、xに1足す
$y = --$x; // 引くのも同じ
$y = $x--;

// 配列の結合
$color = [
    red => 'apple',
    green => 'muscat',
    blue => 'sea',
];
$color2 = [
    red => 'tomato',
    blue => 'sky',
    yellow => 'banana',
];
$newColor = $color + $color2;
print_r($newColor);
/*
以下のような出力となり、左辺にあるキーと重複するものは無視される
※つまりキー指定しない場合で、配列の要素が同数以下である場合、右辺は全無視
Array(
red => apple
green => muscat
blue => sea
yellow => banana
)
*/

// 代入演算子（初見を抜粋）

// .= (文字列結合)
$str1 = 'ペップ';
$str1 .= 'グアルディオラ';
dump($str1); // 出力：ペップグアルディオラ

// ??= (null演算子)
// 左辺がnullの場合は、右辺を代入する
$num1 = 10;
$num2 = null;
$num1 ??= 30;
$num2 ??= '左辺はnullです';
dump("{$num1},{$num2}"); // 出力：10,左辺はnullです

// 連想配列の分割代入
