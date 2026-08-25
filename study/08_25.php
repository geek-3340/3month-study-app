<?php

/* カプセル化
クラスで定義した機能で、「使い手」に必要のないものをブラックボックス化する
ユーザーがアクセスできる機能を制限することにより、使いやすく壊れないクラス
を設計できる
*/

class SquareFigure{
    private int $base;
    private int $height;

    public function __construct(){
        $this->setBase(5);
        $this->setHeight(2);
    }

    public function getBase(){
        return $this->base;
    }

    public function setBase(int $base){
        if($base<=0){
            throw new Exception('baseは正数で指定してください');
        }
        $this->base=$base;
    }

    public function getHeight(){
        return $this->height;
    }

    public function setHeight(int $height){
        if($height<=0){
            throw new Exception('heightは正数で指定してください');
        }
        $this->height=$height;
    }

    public function getArea(){
        return $this->getBase() * $this->getHeight();
    }
}

$square=new SquareFigure();
print $square->getArea(); // 結果：10

/* ------------------------------------------------------------------------------------------- */