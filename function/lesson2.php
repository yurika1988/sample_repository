<?php
// 以下をそれぞれ表示してください。（すべて改行を行って出力すること)
// 現在時刻を自動的に取得するPHPの関数があるので調べて実装してみて下さい。
// 実行するとその都度現在の日本の日時に合わせて出力されるされるようになればOKです。
// 日時がおかしい場合、PHPのタイムゾーン設定を確認して下さい。


// ・現在日時（xxxx年xx月xx日（x曜日））
// ・現在日時から３日後（yyyy年mm月dd日 H時i分s秒）
// ・現在日時から１２時間前（yyyy年mm月dd日 H時i分s秒）
// ・2020年元旦から現在までの経過日数 (ddd日)
date_default_timezone_set('Asia/Tokyo');

// ・現在日時（xxxx年xx月xx日（x曜日））
$week = ["日","月","火","水","木","金","土","日"];
$date  = date("w");
echo date("・現在の日時(Y年m月d日")."($week[$date]曜日))";
echo "<br>";

// ・現在日時（xxxx年xx月xx日（x曜日））
$dateTime3day = new DateTime();
$dateTime3day->modify("+3 day");
$formattedDateTime = $dateTime3day->format("Y年m月d日 H時i分s秒");
echo "・現在日時から3日後(".$formattedDateTime.")";
echo "<br>";

// ・現在日時から１２時間前（yyyy年mm月dd日 H時i分s秒）
$dateTime12h = new DateTime();
$dateTime12h->modify("-12 hour");
$formattedDateTime = $dateTime12h->format("Y年m月d日 H時i分s秒");
echo "・現在日時から12時間前(".$formattedDateTime.")";
echo "<br>";

// ・2020年元旦から現在までの経過日数 (ddd日)
$dateTime2 = new DateTime("2020-01-01");
$dateTime1 = new DateTime("now");
$progress = $dateTime1->diff($dateTime2);
echo "・2020年元旦から現在までの経過日数 (".$progress->days.")日";

