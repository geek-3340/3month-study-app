<?php

// 引数・戻り値の型宣言
/*
引数は直前にスペースを空けて宣言
戻り値は引数リストの後ろに：区切りで宣言
*/
function multiNum(int $num1, int $num2): int
{
    return $num1 * $num2;
}

// null許容型：型の前に ? を付けることでnullを許容するという意味になる

function greeting(?string $name)
{
    return "Hello! {$name}";
}

// union型： | で複数の型を宣言できる
// この宣言に限ってはfalse疑似型を宣言できる（falseを返す可能性がある場合など）
function numTwoTimes(int|float $num)
{
    return $num * 2;
}

// 関数内でグローバル変数を使う方法（global命令）
$num = 5;
function calc(): int
{
    global $num; // この一文で使用可能になる
    return ++$num;
}

// 静的変数　static命令
function calc2()
{
    $x = 0;
    return ++$x;
}
print calc2(); // 結果：1
print calc2(); // 結果：1（複数回呼び出しても、都度値が初期化されるから）

function calc3()
{
    static $x = 0;

    return ++$x;
}
print calc3(); // 結果：1
print calc3(); // 結果：2（初期化されるのは最初の呼び出しのみで状態保持）
// あくまで関数内のローカル変数であるため、関数ブロック内でのみ呼び出し可能

// 引数の参照渡し
function increment(int $num)
{
    return ++$num;
}
$value = 10;
print increment($value); // 結果：11
print $value; // 結果：10（元の値は影響を受けない）

// 以下ように引数の直前に & を付けることで、呼び出し時に引数を参照渡しすることができる
function increment2(int &$num)
{
    return ++$num;
}
$value = 10;
print increment2($value); // 結果：11
print $value; // 結果：11（参照渡しにより、関数内の処理値で更新してるから）

// 引数の規定値、名前付き引数
/*
引数には初期値を入れられる、呼び出し元で引数を省略した場合の値となる
呼び出し時には、パラメーター名を指定して引数を渡せる（順序を気にせず、省略も可能）
*/
function hello(string $name = 'jack', string $age = '20')
{
    return "Hello! My name is {$name}. I'm {$age} years old.";
}
print hello(age: '30'); // 結果：Hello! My name is jack. I'm 30 years old.