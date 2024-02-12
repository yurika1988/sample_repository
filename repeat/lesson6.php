<?php
// 以下配列の中身をfor文を使用して表示してください。
// 表が縦横に伸びてもある程度対応できるように柔軟な作りを目指してください。
// 表示はHTMLの<table>タグを使用すること

/**
 * 表示イメージ
 *  _________________________
 *  |_____|_c1|_c2|_c3|横合計|
 *  |___r1|_10|__5|_20|___35|
 *  |___r2|__7|__8|_12|___27|
 *  |___r3|_25|__9|130|__164|
 *  |縦合計|_42|_22|162|__226|
 *  ‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾
 */

$arr = [
    'r1' => ['c1' => 10,'c2' => 5,'c3' => 20],
    'r2' => ['c1' => 7,'c2' => 8,'c3' => 12],
    'r3' => ['c1' => 25,'c2' => 9,'c3' => 130]
];
$r = count($arr);
$c = count($arr["r1"]);

echo "<table>";
echo "<tr>";
echo "<th></th>";
for ($j = 1; $j <= $c; $j++) {
    echo "<th>c$j</th>";
}
echo "<th>横合計</th>";
echo "</tr>";

$rowTotals = []; // 合計値を格納する配列

for ($i = 1; $i <= $r; $i++) {
    echo "<tr>";
    echo "<th>r$i</th>"; 
    $rowTotal = 0;

    // 各列を処理
    for ($j = 1; $j <= $c; $j++) {
        $value = $arr["r$i"]["c$j"];
        echo "<td>$value</td>"; 
        $rowTotal += $value;
    }
    $rowTotals[] = $rowTotal; // 合計値を配列に追加
    echo "<td>$rowTotal</td>"; 
    echo "</tr>";
}
// 縦合計を計算して表示
echo "<tr>";
echo "<th>縦合計</th>";
for ($j = 1; $j <= $c; $j++) {
    $colTotal = 0; 
    // 各行の同じ列の値を加算して合計を求める
    for ($i = 0; $i < $r; $i++) {
        $colTotal += $arr["r" . ($i + 1)]["c$j"];
    }
    echo "<td>$colTotal</td>"; 
}
// 合計の合計(縦合計)を表示
echo "<td>" . array_sum($rowTotals) . "</td>";
echo "</tr>";
echo "</table>";
?>
</table>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>テーブル表示</title>
<style>
table {
    border:1px solid #000;
    border-collapse: collapse;
}
th, td {
    border:1px solid #000;
}
</style>
</head>
<body>

</body>
</html>