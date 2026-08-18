<?php
// 可変長引数
// 引数を ...$~ で宣言：呼び出し元で任意数の引数を渡せる
// 渡った引数は配列となる
function total(int ...$args): int
{
    $result = 0;
    foreach ($args as $arg) {
        $result += $arg;
    }
    return $result;
}
print total(3, 6, 4, 57);
print total(34, 6, 80);


// 関数の戻り値を複数返したいとき
// 以下のように、返り値を配列で返し、分割代入で関数の返り値を受け取る方法もある
function max_min(int ...$args): array
{
    return [max($args), min($args)];
}
[$maxNum, $minNum] = max_min(3, 2, 6, 8, 43, 58, 23);
print "最大値：{$maxNum}、最小値：{$minNum}";


// 可変関数・高階関数
function myArrayWalk(array $array, callable $func): void // 高階関数：関数を引数として渡したり、戻り値として返したりする関数
{
    foreach ($array as $key => $value) {
        $func($value, $key); // 可変変数：受け取った関数名に応じて実行する
    }
}


function showItem(mixed $value, int|string $key): void
{
    print "{$key}：{$value}<br/>";
}

$data = ['りんご', 'ごりら', 'らっぱ'];

myArrayWalk($data, 'showItem');


// 無名関数（クロージャー）・use命令
function myArrayCalc(array $array, callable $func): void
{
    foreach ($array as $value) {
        $func($value);
    }
}

$data = [1, 2, 3];
$result = 0;

myArrayCalc(
    $data,
    function ($value) use (&$result) {
        $result += $value;
    }
);


// アロー関数
$keys = ['十', '百', '千', '万', '億'];
$data = ['万', '十', '百', '億'];

// クロージャーの場合
usort(
    $data,
    function ($a, $b) use ($keys) {
        return array_search($a, $keys) <=> array_search($b, $keys);
    }
);

$resetData = ['万', '十', '百', '億'];

// アロー関数の場合：use宣言無しで親スコープのデータを参照可能
// 構文：fn(引数)=>式
usort(
    $resetData,
    fn($a, $b) => array_search($a, $keys) <=> array_search($b, $keys)
);
