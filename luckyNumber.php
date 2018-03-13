<?php
/**
 *   ┏┓　　　┏┓
 * ┏┛┻━━━┛┻┓
 * ┃　　　　　　　┃
 * ┃　　　━　　　┃
 * ┃　＞　　　＜　┃
 * ┃　　　　　　　┃
 * ┃...　⌒　...　┃
 * ┃　　　　　　　┃
 * ┗━┓　　　┏━┛
 *     ┃　　　┃　
 *     ┃　　　┃
 *     ┃　　　┃
 *     ┃　　　┃  神兽保佑
 *     ┃　　　┃  代码无bug　　
 *     ┃　　　┃
 *     ┃　　　┗━━━┓
 *     ┃　　　　　　　┣┓
 *     ┃　　　　　　　┏┛
 *     ┗┓┓┏━┳┓┏┛
 *       ┃┫┫　┃┫┫
 *       ┗┻┛　┗┻┛
 */


//创建红球
$redBalls = array();
for ($i = 1; $i <= 33; $i++) {
    $redBalls[] = $i;
}
//创建篮球
$blueBall = array();
for ($i = 1; $i <= 16; $i++) {
    $blueBall[] = $i;
}

//取出球
function takeOut($balls, $num) {

    $takenOutBalls = array();

    for ($i = 1; $i <= $num; $i++) {
        $ball_key = array_rand($balls, 1);
        $takenOutBalls[] = $balls[$ball_key];
        unset($balls[$ball_key]);
    }

    sort($takenOutBalls);

    return $takenOutBalls;

}

//循环多次


$frequency = isset($_GET['num']) ? (int)$_GET['num'] : 1000000;

if ($frequency < 100) {
    $frequency = 100;
}
if ($frequency > 1000000) {
    $frequency = 1000000;
}
$numbers = array();
for ($i = 1; $i <= $frequency; $i++) {
    $red = takeOut($redBalls, 6);
    $blue = takeOut($blueBall, 1);

    $redBall = implode(' ,', $red);

    $numbers[] = '红球：' . $redBall . " 蓝球：" . $blue[0];
}

//利用array_count_values函数 得出重复次数
$numbers_count = array_count_values($numbers);

//排序
arsort($numbers_count);

//取出前100个
$lucky_numbers = array_slice($numbers_count, 0, 100);

foreach ($lucky_numbers as $k => $lucky_number) {

    echo "号码--" . $k . "<br/>";
    echo "出现次数--" . $lucky_number . "次<hr/>";

}