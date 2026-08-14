<?php
/*
文字列関数
*/

// mb_strlen()：文字列の長さを取得する
$text='これは文字列です';
print mb_strlen($text); // 結果：8

// mb_convert_case()：文字列の大文字・小文字を変換する
$text='Hello World';
print mb_convert_case($text, MB_CASE_UPPER); // 結果：HELLO WORLD
print mb_convert_case($text, MB_CASE_LOWER); // 結果：hello
print mb_convert_case($text, MB_CASE_TITLE); // 結果：Hello world

// mb_substr()：文字列から文字を取り出す
print mb_substr($text,1,3); // 結果：ell

// mb_strstr()：検索文字列の後方（前方）を取得
print mb_strstr($text,'o',true); // 結果：Hell
print mb_strstr($text,'o'); // 結果： world ※defaltがfalseのため

// str_replace：検索文字列を指定文字列に置き換える（置換数も返す）
print str_replace('l','o',$text,$count);
print "{$count}箇所の文字を置き替えました";

// mb_substr_count：検索文字列の登場回数を返す
$text = 'いちいちいちばにいち';
print mb_substr_count($text,'いちいち'); // 結果：1 ※重複のない判定をする

// mb_contains：検索文字列があるかを真偽値で返す
if(str_contains($text,'ばに')){
    print 'あり';
}else{
    print 'なし';
}

/*
配列関数
*/

// 配列の要素数取得
$data=['りんご','バナナ','もも'];
print count($data); // 結果：3

$data=[
    [1,2,3],
    [4,5,6],
];
print count($data); // 結果：2

// 配列の連結
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

// 配列内の要素を指定した文字で連結する
$data=['php','java','python','go'];
print implode('/',$data); // 結果：php/java/python/go

