<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat-gpt答案參考</title>
</head>
<body>
<?php
// 獲取目前的月份，如果沒有提供就用當前月份
if (isset($_GET['month'])) {
    $month = $_GET['month'];
} else {
    $month = date("m");
}

// 計算當前年份
$year = date("Y");
if ($month < 1) {
    $month = 12;
    $year--;
} elseif ($month > 12) {
    $month = 1;
    $year++;
}

// 計算上一個月和下一個月
$prevMonth = $month - 1;
$nextMonth = $month + 1;

// 如果上一個月小於1，改成12並減一個年份
if ($prevMonth < 1) {
    $prevMonth = 12;
    $year--;
}

// 如果下一個月大於12，改成1並加一個年份
if ($nextMonth > 12) {
    $nextMonth = 1;
    $year++;
}

// 顯示導航連結
echo '<a href="calendar.php?month=' . ($month - 12) . '">前年</a>';
echo '<a href="calendar.php?month=' . $prevMonth . '">上一個月</a>';
echo '<a href="calendar.php?month=' . $nextMonth . '">下一個月</a>';
echo '<a href="calendar.php?month=' . ($month + 12) . '">明年</a>';
echo '<h3>' . $year . '年 ' . $month . '月</h3>';

// 開始生成日曆
echo '<table border="1">';
echo '<tr>';
echo '<td></td>'; // 顯示空白的列
echo '<td>日</td>';
echo '<td>一</td>';
echo '<td>二</td>';
echo '<td>三</td>';
echo '<td>四</td>';
echo '<td>五</td>';
echo '<td>六</td>';
echo '</tr>';

// 計算這個月的第一天是星期幾
$firstDay = "$year-$month-01";
$firstDayTime = strtotime($firstDay);
$firstDayWeek = date("w", $firstDayTime);
$numberOfDays = date("t", $firstDayTime); // 獲取這個月有多少天

// 使用兩個循環來生成日曆
for ($i = 0; $i < 6; $i++) { // 6行
    echo "<tr>";
    echo "<td>" . ($i + 1) . "</td>"; // 顯示行數
    for ($j = 0; $j < 7; $j++) { // 7列
        $cell = $i * 7 + $j - $firstDayWeek; // 計算當前格子是幾號
        $theDayTime = strtotime("$cell days", $firstDayTime); // 計算當前日期

        // 判斷這個日期是否在這個月
        if (date("m", $theDayTime) == $month) {
            echo "<td>" . date("d", $theDayTime) . "</td>"; // 顯示日期
        } else {
            echo "<td></td>"; // 如果不是這個月，顯示空白
        }
    }
    echo "</tr>";
}
echo '</table>';
?>

</body>
</html>