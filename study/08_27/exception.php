<?php
// 例外処理
/*
あらかじめ発生するかもしれない、エラーや例外を捕捉して
適切な処理を実装する
*/

// 以下はURLをもとに、データを取得するクラス
class MyUtil
{
    public static function getContents(string $url): string
    {
        // 例外クラスのインスタンスを生成しthrowでエラー／例外を意図的に発生させる関数を定義
        // throw命令：例外クラスのインスタンスをエラー／例外として返す（アロー関数の処理に入れることも可能）
        $throwInvArgExp = fn() => throw new InvalidArgumentException('不正なURLの形式です');
        $throwRuntimeExp = fn() => throw new RuntimeException('指定されたURLが見つかりません');

        // 指定されたURLの形式が正しくない場合……
        // ショートカット演算子で左辺がfalseの場合、例外をthrowする処理
        preg_match('|http(s)?://([\w-]+\.)+[\w-]+(/[\w ./?%&=-]*)?|', $url) || $throwInvArgExp();

        $data = @file_get_contents($url);

        // データを取得できなかった場合……
        // 三項演算子で$dataが空の場合、例外をthrowする（他にもnull合体演算子も使用可）
        return $data ? $data : $throwRuntimeExp();
    }
}

try {
    // この中で上記にように意図しない挙動を捕捉し、可能な限り”標準例外クラス”を用いて例外を投げる処理を書く
    print MyUtil::getContents('https://wings.msn.to/nothing/xxx/');
} catch (RuntimeException | InvalidArgumentException $e) { // ここでtry{}で実装した例外処理を検知する（マルチキャッチ構文：例外型を | で列挙）
    print "エラーメッセージ：{$e->getMessage()}";
} finally {
    print '<br><br>[ 処理完了 ]';
}

// これにより、エラーには出ずとも意図はしてない引数や処理結果を捕捉し、知らせることが出来る
/* 注意：
・Exceptionクラスは全ての例外（エラーも含む）を捕捉するので、基本使わない
・上記では、アロー関数・三項演算子・null合体演算子・ショートカット演算子が使用できることを示すための実装をしたが
　シンプルにif文で書いた方が見やすかったりする
・} catch (Exception $e){} のようにして握りつぶすのは最悪のアンチパターン
*/