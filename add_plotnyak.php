<?php
include("inc/head.php");
access();
AutorizeProtect();
global $connect;
global $usr;
echo '<div class="contadiner">';
$plotnyak   = h($_GET['plotnyak'], ENT_QUOTES, "utf-8");
$region   = $_GET['region'];
$technik1 = $_GET['technik']['0'];
$technik2 = $_GET['technik']['1'];
$technik3 = $_GET['technik']['2'];
$technik4 = $_GET['technik']['3'];
$technik5 = $_GET['technik']['4'];
$technik6 = $_GET['technik']['5'];
$technik7 = $_GET['technik']['6'];
$technik8 = $_GET['technik']['7'];
$date     = date("Y.m.d");

$user = $usr['name'];

















if (!empty($technik1)) {
    $ebat_code = 1;
    $text = 'Ты ебанулся. Никто не делал плотняк??';
}
if (!empty($technik2)) {
    $ebat_code = 2;

}
if (!empty($technik3)) {
    $ebat_code = 3;
}
if (!empty($technik4)) {
    $ebat_code = 4;
}
if (!empty($technik5)) {
    $ebat_code = 5;
}
if (!empty($technik6)) {
    $ebat_code = 6;
}
if (!empty($technik7)) {
    $ebat_code = 7;
}
if (!empty($technik8)) {
    $ebat_code = 8;
}

$plotnyak = $plotnyak / $ebat_code;








$sql = "INSERT INTO plotnyak (plotnyak, technik1, technik2, technik3, technik4, technik5, technik6, technik7, technik8, date)
			VALUES (
			'$plotnyak',
			'$technik1',
			'$technik2',
			'$technik3',
			'$technik4',
			'$technik5',
            '$technik6',
            '$technik7',
            '$technik8',
			'$date'
			)";
if ($connect->query($sql) === true) {
} else {
    echo $connect->error;
}

?>
    <meta http-equiv="refresh" content="0;URL='plotnyak_list.php'">
    </div>
<?php
include('inc/foot.php');