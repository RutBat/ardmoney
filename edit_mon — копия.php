<?php
include "inc/function.php";
AutorizeProtect();
access();
global $connect;
global $usr;
$name     = h($_GET['vid_rabot']);
$status = h($_GET['status']);
$mon_id     = h($_GET['mon_id']);
$count     = h($_GET['count']);
$summa     = h($_GET['summa']);
$kajdomu     = h($_GET['kajdomu']);
$other     = h($_GET['other']);
if($name == "#Другое"){
$name = substr( $name, 1); //удаляет #
}
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
if(!empty($name) and !empty($mon_id)){
$vid_montaj = $connect->query("SELECT * FROM `vid_rabot` WHERE `name` = '" . $name . "' limit 1");
if ($vid_montaj->num_rows != 0)
$vid_mon = $vid_montaj->fetch_array(MYSQLI_ASSOC);
$pric = $vid_mon['price_tech'];
$price = $pric * $count;
if(!empty($other)){
$text = $other;
}else{
$text = $vid_mon['text'];
}
$log   = "$date $fio $text2 $adress $new_status_home";
$zap   = "INSERT INTO array_montaj (name, mon_id, count, price, text)
VALUES (
'$name',
'$mon_id',
'$count',
'$price',
'$text'
)";
if ($connect->query($zap) === true) {
} else {
    echo "Ошибка: " . $sql . "<br>" . $connect->error;
}
}
edit_montaj_summa("$mon_id","$status");
 red_index("result.php?vid_id=$mon_id");