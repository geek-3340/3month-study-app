<?php
/*
配列関数
*/

// count()：配列の要素数取得
$data=['りんご','バナナ','もも'];
print count($data); // 結果：3

$data=[
    [1,2,3],
    [4,5,6],
];
print count($data); // 結果：2

// array_merge()：配列の連結
$data1=[
    'りんご'=>'赤',
    'バナナ'=>'黄',
    'もも'=>'ピンク',
];
$data2=[
    'りんご'=>'緑',
    'みかん'=>'オレンジ',
    'バナナ'=>'黄緑',
];
$result=array_merge($data1,$data2);
print_r($result);
/* 結果
Array(
    [りんご]=>緑
    [バナナ]=>黄緑
    [もも]=>ピンク
    [みかん]=>オレンジ
)
*/

$data1=[1,2,3];
$data2=[4,5,6];
$result=array_merge($data1,$data2);
print_r($result);
/* 結果
Array(
    [0]=>1
    [1]=>2
    [2]=>3
    [3]=>4
    [4]=>5
    [5]=>6
)
*/

/*
上記の２つの結果でわかるように、＋演算子での連結との違いは
・連想配列のキーが重複する場合、「後者」優先
・インデックスが重複する場合、２つめの配列は無視されず、新たに番号が振られる
*/

// implode()：配列内の要素を指定した文字で連結する
$data=['php','java','python','go'];
print implode('/',$data); // 結果：php/java/python/go

// array_push/pop,shift/unshift：配列の先頭、末尾に要素を追加・削除する
$arr=['山田','佐藤','田中'];
array_push($arr,'松本','村田'); // 末尾に追加
array_pop($arr);               // 末尾から削除
array_shift($arr);             // 先頭から削除
array_unshift($arr,'山本');    // 先頭に追加
print_r($arr);
/*
Array(
    [0] => 山本
    [1] => 佐藤
    [2] => 田中
    [3] => 松本
)
*/

/*
スタック／キューについて
これらは構造を意味する
スタック：
    先入れ後出し（またはその逆）
    pushとpopで表現可能
キュー：
    先入れ先出し（またはその逆）
    pushとshiftで表現可能
*/

// array_splice：配列に複数要素を追加・置換・削除
$arr=['山田','田中','佐藤'];
$result=array_splice($arr,1,2,['後藤','池田']);
print_r($result);
print_r($arr);

$result=array_splice($arr,-2,-1,'田中');
print_r($result);
print_r($arr);