<?php
/*
制御構文（既知は省略）
*/

//  match文（switch文の値を返すver）
/*
switch文との違い：
・比較に===演算子を用いて厳格に評価する
・右辺は単一の値である必要がある（返り値となるため）
・break不要（暗黙的に付与）
・左辺に関数やメソッドを用いることが出来る

switch文では：
・合致後に処理をおこなう（matchでは値を返す）ので複数の処理を実行可能
*/
$review = 80;
$feedback = match ($review) {
    80 => '合格',
    50 => '追試',
    30 => '落第',
    default => '未実施',
};
$review = 50;
switch ($review) {
    case 80:
        $feedback = '合格';
        break;
    case 50:
        $feedback = '追試';
        break;
    case 30:
        $feedback = '落第';
        break;
    default:
        $feedback = '未実施';
        break;
}

print("{$review},{$feedback}");

// while文とdo~while文の違い
/*
do~whileは後置判定なので条件式に結果がfalseでも
一回は実行される（以下の場合、do~whileの方は"6番目のループです"が一度出力される）
*/
$i = 6;
while ($i < 6) {
    print "{$i}番目のループ<br/>";
    $i++;
}

$i = 6;
do {
    print "{$i}番目のループ<br/>";
    $i++;
} while ($i < 6);

// forEach文
$data = ['りんご', 'バナナ', 'もも'];
foreach ($data as $item) {
    print "これは{$item}です";
}

// 連想配列の場合
$data = ['りんご' => '赤', 'バナナ' => '黄', 'もも' => 'ピンク'];
foreach ($data as $key => $value) {
    print "{$key}は{$value}色です";
}

// forEachを用いた分割代入
$books = [
    ['title' => '独習Python', 'price' => 3000],
    ['title' => '独習Java 新版', 'price' => 2980],
    ['title' => '独習C# 新版', 'price' => 3600],
];
foreach ($books as ['title' => $title, 'price' => $price]) {
    print "{$title}（{$price}円）<br />";
}

// ループの制御　continue命令
/*
特定の条件下において、ループは続けたいけど処理はスキップしたい時に使う
*/
$sum = 0;
for ($i = 1; $i <= 100; $i++) {
    if ($i % 2 !== 0) {
        continue;
    }
    $sum += $i;
}
print "合計値は{$sum}です。";    // 結果：合計値は2550です。