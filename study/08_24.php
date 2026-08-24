<?php
// コンストラクター
class Person
{

    public string $firstName;
    public string $lastName;

    public function __construct(string $firstName, string $lastName)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
    }

    public function show(): void
    {
        print "<h1>俺様は俳優の{$this->firstName} {$this->lastName}だぞ！！<br>覚えとけ！！！</h1><br>";
    }
}

$p = new Person('佐藤', '健');
$p->show();

// コンストラクターの省略記法
class Person2
{
    // コンストラクタ関数の引数エリアにアクセス修飾子を付けることで、変数定義も同時にできる
    public function __construct(public string $firstName, public string $lastName) {}
    public function show(): void
    {
        print "<h2>私は女優の{$this->firstName} {$this->lastName}よ！！<br>銀行に、行く！！！</h2><br>";
    }
}
$p = new Person2('吉高', '由里子');
$p->show();

/* ------------------------------------------------------------------------------------------- */

// クラスメソッド・クラスプロパティ
class Calc
{

    public static int $num = 5;

    // クラス内でクラスプロパティを参照するときは、self::$変数名（$this使用不可）
    public static function sum(): void
    {
        print 20 + self::$num;
    }
}

print Calc::$num;
print '<br>';
Calc::sum();

/* ------------------------------------------------------------------------------------------- */

// シングルトンパターン（インスタンス生成は１度きり）
/*
外からはgetInstanceメソッドのみアクセス可能
getInstanceメソッドでは$instanceが空であれば、インスタンスを生成して返す
無ければ何もせずに、初期生成されたインスタンスが返る
*/
class mySingleton
{
    // 以下２つがprivateであることが必須
    private static self $instance;
    private function __construct() {}

    // このメソッドが初期化済みかの判定と、インスタンス生成をする
    public static function getInstance(): self
    {
        if (!isset(self::$instance)) {
            self::$instance = new mySingleton();
        }
        return self::$instance;
    }
}

// インスタンスはgetInstanceからのみ可能（それしかアクセスできない）
$instance = mySingleton::getInstance();

/* ------------------------------------------------------------------------------------------- */

// クラス定数（値の再代入不可のため、必然的にstaticの挙動となる）
class Calc2
{

    public const NUM = 10;

    // クラス内でクラスプロパティを参照するときは、self::$変数名（$this使用不可）
    public static function sum(): void
    {
        print 20 + self::NUM;
    }
}

print '<br>';
print Calc2::NUM;
print '<br>';
Calc2::sum();

/* ------------------------------------------------------------------------------------------- */

