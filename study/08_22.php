<?php

/* ------------------------------------------------------------------------------------------- */

class Person
{

    // プロパティは 修飾子 + 型 + プロパティ名 で定義
    public string $firstName;
    public string $lastName;

    // $thisはこのクラスから生成されるインスタンス
    public function show()
    {
        print "僕の名前は{$this->firstName} {$this->lastName}です！<br>";
    }
}

$instance1 = new Person();
$instance1->firstName = '山田';
$instance1->lastName = '太郎';
$instance1->age = 20; // 動的にプロパティを追加

print "{$instance1->firstName} {$instance1->lastName}です。{$instance1->age}歳です。<br>";
$instance1->show();

/* ------------------------------------------------------------------------------------------- */

// メソッドを動的に追加する場合、以下の形
class Person2
{

    // 動的に追加するメソッドを格納するプロパティ（配列）を定義
    private array $method = [];

    // 動的に追加されたメソッドを登録
    public function __set(string $name, Closure $method): void
    {
        $this->method[$name] = $method->bindTo($this, self::class);
    }

    // 登録されたメソッドを呼び出し
    public function __call(string $name, array $args): mixed
    {
        if (!array_key_exists($name, $this->method)) {
            throw new Exception("{$name} method is not existed.");
        }
        return $this->method[$name](...$args);
    }
}

$p = new Person2();
$p->addFunc = function (string $action): void {
    print "これは{$action}されたメソッドの実行結果です<br>";
};
$p->addFunc('追加');