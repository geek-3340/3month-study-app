<?php
// array_search：配列の中に特定の要素があるか検索する
/*
合った場合の返り値はキー、無い場合はfalseとなる
大文字小文字は区別する
演算子はデフォルトで==（2と'2'は同じになる）
第三引数にtrueを入れると===で比較する
*/
$data1 = ['PHP', 'Ruby', 'Java'];
$data2 = [1, 2, 3];
$result = array_search('php', $data1);
$result = array_search('2', $data2);
$result = array_search('2', $data2, true);

// usort：独自ルールでの配列の並び替え
// 単位を昇順に準備
$keys = ['十', '百', '千', '万', '億',];
// ソート対象の配列
$data = ['億', '十', '万', '百'];
// 指定された単位で配列$dataをソート
$result = usort($data, function ($a, $b) use ($keys) {
    return array_search($a, $keys) <=> array_search($b, $keys);
});
// 結果：Array ( [0] => 十 [1] => 百 [2] => 万 [3] => 億 )

// array_map：配列を要素ごとに加工し新たな配列を作る
$data = [1, 2, 3, 4, 5];
$result = array_map(function ($num) {
    return $num * 10;
}, $data);

// array_filter：配列から指定の条件に合う要素を抽出し、新たな配列を作る（キーは保持される）
$data = [3, 6, 32, 8, 765];
$result = array_filter($data, function ($num) {
    return $num >= 8;
});
print_r($result);
