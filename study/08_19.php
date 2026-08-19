<?php

/* オブジェクト指向とは

プログラムで扱う対象を、モノ（オブジェクト）に見立てて
オブジェクトを中心にコードを組み立てていく手法、概念

ある機能をオブジェクトとすると
・その機能で扱うデータ（変数・定数）
・データを操作するための処理（関数）
をまとめて管理でき、実装にはクラスライブラリ（PHPの場合）を用いる
*/

// クラスとはオブジェクトの設計図であり、
// その設計図を基にオブジェクト（インスタンス）を作る

// クラス定義
class Hoge
{
    public static $yaa = 'やー！';
    public $var;
    function sayHoge()
    {
        print "言うぞ！{$this?->var}！！";
    }
}

// クラスプロパティ（静的プロパティ）呼び出し：インスタンスを作らずに呼び出し可能
print Hoge::$yaa;

// インスタンス化（Hogeオブジェクト生成）
$hoge = new Hoge();

// プロパティ呼び出し・値を格納
print $hoge->var = 'バー';

// メソッド呼び出し
$hoge->sayHoge();

/*
DateTimeクラス
日付/時刻の演算や整形をするためのクラス
*/
// 引数を空、または第一を「'now'」第ニをDateTimeZoneインスタンスとすることで
// 現在の日時を生成できる
$now = new DateTime('now', new DateTimeZone('Asia/Tokyo'));
print $now->format('yy/m/d h:m:s'); // 結果：（例）26/11/1 5:10:25

// 日付、時刻を指定することも可能
$now = new DateTime('2025/12/31 5:55:55');
print $now->format('Y年m月d日H時i分');

// 日付、時刻を個別に指定
$now = new DateTime();
$now->setDate(2021,10,25);
$now->setTime(21,0,0);
print $now->format('Y年m月d日H時i分');