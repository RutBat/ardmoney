<?php
include "inc/function.php";
AutorizeProtect();
access();
global $connect;
global $usr;
$name1     = h($_GET['vid_rabot1']);
$count1     = h($_GET['count1']);

$name2    = h($_GET['vid_rabot2']);
$count2     = h($_GET['count2']);

$name3     = h($_GET['vid_rabot3']);
$count3     = h($_GET['count3']);

$name4     = h($_GET['vid_rabot4']);
$count4     = h($_GET['count4']);


$status = h($_GET['status']);
$mon_id     = h($_GET['mon_id']);
$summa     = h($_GET['summa']);
$kajdomu     = h($_GET['kajdomu']);
$other     = h($_GET['other']);
// if($name == "#Другое"){
// $name = substr( $name, 1); //удаляет #
// }
if($status == "on"){
    $status = 1;
}else{
    $status = 0;
}
if(isset($_GET[delete]))
{
$id_del = $_GET[delete];
del_mon($id_del);
}//удаление монтажей
                                $montaj = $connect->query("SELECT * FROM `montaj` WHERE `id` = '" . $id . "' limit 1");
                                if ($montaj->num_rows != 0)
                                    $mon = $montaj->fetch_array(MYSQLI_ASSOC);
                                    $tech1 = $mon['technik1'];
                                    $tech2 = $mon['technik2'];
                                    $tech3 = $mon['technik3'];
                                    $tech4 = $mon['technik4'];
                                    $tech5 = $mon['technik5'];
                                    $tech6 = $mon['technik6'];
                                    $tech7 = $mon['technik7'];
                                    $tech8 = $mon['technik8'];
if(!empty($name1) and !empty($mon_id)){
$vid_montaj1 = $connect->query("SELECT * FROM `vid_rabot` WHERE `name` = '" . $name1 . "' limit 1");
if ($vid_montaj1->num_rows != 0)
$vid_mon1 = $vid_montaj1->fetch_array(MYSQLI_ASSOC);
$pric1 = $vid_mon1['price_tech'];
$price1 = $pric1 * $count1;
if(!empty($other)){
$text = $other;
}else{
$text = $vid_mon1['text'];
}
$log   = "$date $fio $text2 $adress $new_status_home";
$zap   = "INSERT INTO array_montaj (name, mon_id, count, price, text)
VALUES (
'$name1',
'$mon_id',
'$count1',
'$price1',
'$text'
)";
if ($connect->query($zap) === true) {
} else {
    echo "Ошибка: " . $sql . "<br>" . $connect->error;
}
}






if(!empty($name2) and !empty($mon_id)){
$vid_montaj2 = $connect->query("SELECT * FROM `vid_rabot` WHERE `name` = '" . $name2 . "' limit 1");
if ($vid_montaj2->num_rows != 0)
$vid_mon2 = $vid_montaj2->fetch_array(MYSQLI_ASSOC);
$pric2 = $vid_mon2['price_tech'];
$price2 = $pric2 * $count2;
if(!empty($other)){
$text = $other;
}else{
$text = $vid_mon2['text'];
}
$log   = "$date $fio $text2 $adress $new_status_home";
$zap   = "INSERT INTO array_montaj (name, mon_id, count, price, text)
VALUES (
'$name2',
'$mon_id',
'$count2',
'$price2',
'$text'
)";
if ($connect->query($zap) === true) {
} else {
    echo "Ошибка: " . $sql . "<br>" . $connect->error;
}
}





if(!empty($name3) and !empty($mon_id)){
$vid_montaj3 = $connect->query("SELECT * FROM `vid_rabot` WHERE `name` = '" . $name3 . "' limit 1");
if ($vid_montaj3->num_rows != 0)
$vid_mon3 = $vid_montaj3->fetch_array(MYSQLI_ASSOC);
$pric3 = $vid_mon3['price_tech'];
$price3 = $pric3 * $count3;
if(!empty($other)){
$text = $other;
}else{
$text = $vid_mon3['text'];
}
$log   = "$date $fio $text2 $adress $new_status_home";
$zap   = "INSERT INTO array_montaj (name, mon_id, count, price, text)
VALUES (
'$name3',
'$mon_id',
'$count3',
'$price3',
'$text'
)";
if ($connect->query($zap) === true) {
} else {
    echo "Ошибка: " . $sql . "<br>" . $connect->error;
}
}






if(!empty($name4) and !empty($mon_id)){
$vid_montaj4 = $connect->query("SELECT * FROM `vid_rabot` WHERE `name` = '" . $name4 . "' limit 1");
if ($vid_montaj4->num_rows != 0)
$vid_mon4 = $vid_montaj4->fetch_array(MYSQLI_ASSOC);
$pric4 = $vid_mon4['price_tech'];
$price4 = $pric4 * $count4;
if(!empty($other)){
$text = $other;
}else{
$text = $vid_mon4['text'];
}
$log   = "$date $fio $text2 $adress $new_status_home";
$zap   = "INSERT INTO array_montaj (name, mon_id, count, price, text)
VALUES (
'$name4',
'$mon_id',
'$count4',
'$price4',
'$text'
)";
if ($connect->query($zap) === true) {
} else {
    echo "Ошибка: " . $sql . "<br>" . $connect->error;
}
}





edit_montaj_summa("$mon_id","$status");
 red_index("result.php?vid_id=$mon_id");