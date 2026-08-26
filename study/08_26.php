<?php
// 抽象クラス
/*
・抽象メソッド：オーバライド必須の処理を持たないメソッド（アクセス修飾子の後ろにabstractを付ける）
・抽象メソッドをメンバーに持つクラスもabstractを付けて抽象クラスにしなくてはならない
・スーパークラスとサブクラスに「is a」の関係が成り立つ場合に使用する
・下記の例でいくと「Cat is a Animal」= 猫 は 動物 という関係が成り立つ
・スーパークラスもアクセス可能なプロパティやメソッドを持つことが可能
・多重継承不可のため継承先でポリモーフィズムを実現したい機能をスーパークラスに集約する必要がある
*/

abstract class Animal
{

    protected string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    // 寝ることは全動物共通だからこのクラスに記述
    public function sleep()
    {
        print "{$this->name}は寝た<br>";
    }

    // 動物の種類に依存する鳴き声や食べるものはサブクラスでオーバライド
    protected abstract function speak(): void;
    protected abstract function eat(): void;
}

class Cat extends Animal
{

    // override
    public function speak(): void
    {
        print "{$this->name}はニャーと鳴いた<br>";
    }

    // override
    public function eat(): void
    {
        print "{$this->name}は魚を食べた<br>";
    }
}

$cat = new Cat('猫');
$cat->sleep();
$cat->speak();
$cat->eat();

/* ------------------------------------------------------------------------------------------- */

// インターフェイス
/*
・interface ～Interface{} と記述する
・配下のメンバー全てが抽象メソッドまたは定数でなくてはならない
・メソッドは抽象メソッドであることは明らかなので、abstract修飾子は不要（アクセス修飾子も不要）
・スーパークラスとサブクラスに「can do」の関係が成り立つ場合に使用する
・下記の例でいくと「Casher can bill CreditCard」= レジ は クレカで会計できる という関係が成り立つ
・継承ではなく実装：使用先は実装クラス（実装はextendsではなくimplements interface, interface, ...）
*/
interface CasherInterface
{
    // 支払いができる（何で は実装クラスで決める）
    function bill(): string;
}

interface ShoppingInterface
{
    // 買える（何を は実装クラスで決める）
    function buy(): string;
}

class BuyKeyboardByCreditCard implements CasherInterface, ShoppingInterface
{

    // override
    public function bill(): string
    {
        return 'クレジットカードで';
    }

    // override
    public function buy(): string
    {
        return 'HHKBのキーボードを買う';
    }

    public function action(): void
    {
        print "{$this->bill()}{$this->buy()}";
    }
}

$shopping = new BuyKeyboardByCreditCard();

// instanceof演算子：変数などが指定のインターフェイスから実装されているかを判定する
if (
    $shopping instanceof CasherInterface
    &&
    $shopping instanceof ShoppingInterface
) {
    $shopping->action();
}
