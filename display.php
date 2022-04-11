<?php
// POST形式で値を受け取る
$key = $_POST['key'];
unset( $_POST['key']);

// URLを設定
$url = 'http://zipcloud.ibsnet.co.jp/api/search?zipcode=' . $key;

// URLをUTF8文字列で取得する
$resJson = mb_convert_encoding(file_get_contents($url), 'UTF8');

// JSON形式で取得
$res = json_decode($resJson,true);


// 値をそれぞれ取得する
$prefecture = $res['results'][0]['address1'];
$city = $res['results'][0]['address2'];
$city2 = $res['results'][0]['address3'];
$code = $res['results'][0]['zipcode'];

print("「{$code}」<br>の住所は<br>「{$prefecture}{$city}{$city2}」");

?>