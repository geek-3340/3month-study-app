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