<?php
session_start();
include("function.php");// Тут висят все функции сайта.
echo '<!doctype html>
<html lang="ru">
';

include("style.php");// тег head в котором указываются все стили сайта
echo '<body style = "background: #ffffff url(img/bg.png) repeat;">';
echo '<div class="container-sm">';
//Если первый раз входим на сайт, то показываем анимацию загрузки
$gde = $_SERVER["REQUEST_URI"];/////////////////////////////////
if ($gde == "spisok.php") {
    preloader();
}//////////////////////////////////
include("navbar.php");//Навигационный бар
?>

<main role="main">
    <div style="min-height: calc(100vh - 9rem);padding: 0 0;    background: #e9e9e99e;
" class="jumbotron">
        <div class="col-md-12 col-sm-12  mx-auto">