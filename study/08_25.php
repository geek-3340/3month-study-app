<?php

/* カプセル化
クラスで定義した機能で、「使い手」に必要のないものをブラックボックス化する
ユーザーがアクセスできる機能を制限することにより、使いやすく壊れないクラス
を設計できる
*/

// アクセサリーメソッド・・・ゲッター／セッター
// カプセル化を実現する機能
class SquareFigure
{

    // プロパティには直接アクセスさせない
    private int $base;
    private int $height;

    // インスタンスはセッター経由
    public function __construct()
    {
        $this->setBase(5);
        $this->setHeight(2);
    }

    // ゲッター／セッターは get（set）+ キャメルケース変数名で書くのが定石（例：getBase）

    // ゲッター：この場合、プロパティを返すのみで代入不可（読み取り専用）
    public function getBase()
    {
        return $this->base;
    }

    // セッター：値の代入のみ、バリデーションも実装できる（読み取り専用の変数にしたい場合、セッターは書かない）
    public function setBase(int $base)
    {
        if ($base <= 0) {
            throw new Exception('baseは正数で指定してください');
        }
        $this->base = $base;
    }

    public function getHeight()
    {
        return $this->height;
    }

    public function setHeight(int $height)
    {
        if ($height <= 0) {
            throw new Exception('heightは正数で指定してください');
        }
        $this->height = $height;
    }

    public function getArea()
    {
        return $this->getBase() * $this->getHeight();
    }
}

$square = new SquareFigure();
print $square->getArea(); // 結果：10

/* ------------------------------------------------------------------------------------------- */

// 継承
class Person
{

    public function __construct(
        protected string $firstName, // protected・・・このクラスとサブクラスからのみ参照可能
        protected string $lastName,
    ) {}

    public function fullName(): void
    {
        print "<br>{$this->firstName} {$this->lastName}<br>";
    }

    public function greeting()
    {
        print "こんにちは、私は無職の{$this->firstName} {$this->lastName}です<br>";
    }
}

// Personクラスを継承
// 親クラスをスーパークラス、子クラスをサブクラスという
class BusinessPerson extends Person
{

    // final修飾子・・・継承先のサブクラスでオーバライド不可
    public final function work(): void
    {
        print "{$this->firstName} {$this->lastName}は働いています<br>";
    }

    // メソッドのオーバーライド（上書き）
    /*
    条件
    ・メソッド名の一致
    ・パラメーターは同じかより広い型、個数は一致（名前と初期値は異なっても可）
    ・戻り値型は同じかより狭い型
    ・アクセス修飾子は同じかより緩いもの
    */
    public function greeting()
    {
        print "こんにちは、私はビジネスマンの{$this->firstName} {$this->lastName}です<br>";
    }

    // オーバーライドしてもスーパークラスのメソッド呼び出しは以下のように可能
    public function parentGreeting()
    {
        parent::greeting(); // parent::オーバーライドしたメソッド名
    }
}

// プロパティ・メソッド呼び出しサブクラス → スーパークラスの順に参照される挙動
$person = new BusinessPerson('山田', '太郎');
$person->fullName();
$person->work();
$person->greeting();
$person->parentGreeting();

/* ------------------------------------------------------------------------------------------- */

// ポリモーフィズム
/*
基本・・・同名のメソッドで、同じ目的を、異なる挙動で、実現すること
*/
class Figure
{

    protected float $width;
    protected float $height;

    public function __construct(float $width, float $height)
    {
        $this->width = $width;
        $this->height = $height;
    }

    public function getArea()
    {
        return 0; // 戻り値はダミー
    }
}

class Triangle extends Figure
{
    public function getArea()
    {
        return $this->width * $this->height / 2;
    }
}

class Square extends Figure
{
    public function getArea()
    {
        return $this->width * $this->height;
    }
}

$t=new Triangle(10,2);
$s=new Square(10,2);

// 同名のメソッドで、同じ「面積を求める」という目的を、三角形・四角形の「異なる計算（挙動）」で実現してる
// 使い手が、対象が異なるだけで同じ目的の処理をしたいとき、異なるメソッド名を覚えなくて済む
print $t->getArea();
print $s->getArea();

// 上記はポリモーフィズムとして不十分 ＝ スーパークラスの中身を知ってる前提となり、使い手が必ずgetArea()をオーバライドするとは限らない
// そこで重要となるのが、抽象クラスとインターフェイス（...翌日の学習へ）