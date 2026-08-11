<?php
/*
比較演算子（既知を除く）
*/

// 三項演算子（{式} ? {trueの値} : {falseの値}）
$result = 1==='1'?'値も型も一致':'不一致';

// null合体演算子（左辺がnullでなければその値、左辺のみnullなら右辺の値、両方nullならnull）
$thisIsNull = null;
$result = $thisIsNull ?? '左辺はnullです';

/* 配列の比較
比較優先順位
1. 要素数
2. 同一キーの値の大小を比較、見つかり次第判定終了
3. 1と2の比較がすべて等しい場合、両者は等しいと判定
*/

$arr1 = [1,2,3];
$arr2 = [8,9];
$result = $arr1 > $arr2; // true：arr1の方が要素数が多いため

$arr3 = [7,1,2];
$result = $arr1 > $arr3; // false：arr1[0]とarr3[0]ではarr3の値の方が大きいため（2つめ以降は判定終了で無視）

$arr4 = [1,2,'3'];
$result = $arr1 == $arr4; // true：型を見ないから
$result = $arr1 === $arr4; // false：型も見るから

$arr5 = ['a'=>'A','b'=>'B','c'=>'C'];
$arr6 = ['a'=>'A','c'=>'C','b'=>'B'];
$result = $arr5 == $arr6; // true：要素数、キー値の組み合わせが等しいから
$result = $arr5 === $arr6; // false：順番も見るから

/*
制御構文（既知を除く）
*/

// match式