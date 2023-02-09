<?php
include "inc/head.php";
access();
AutorizeProtect();
global $connect;
global $usr;
?>
    <head>
        <title>Страница пользователя</title>
    </head>
<?
    $month = date_view($_GET['date']);
    $date_blyat = "$_GET[date]";
if (!isset($_GET[date])) {
    $month = date('m');
    $year = date('y');
$month = month_view(date('m'));
    $date = date("Y-m-d");
    $date_blyat = substr($date, 0, -3);
}
?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"></a>
            <div class="navbar-collapse" id="navbarNavDarkDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a
                        class="nav-link dropdown-toggle"
                        href="#"
                        id="navbarDarkDropdownMenuLink"
                        role="button"
                        data-bs-toggle="dropdown"
                        aria-expanded="false"
                        >
                            <?= $month ?>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                            <li><a class="dropdown-item" href="?date=2023-01">Январь</a></li>
                            <li><a class="dropdown-item" href="?date=2023-02">Февраль</a></li>
                            <li><a class="dropdown-item" href="?date=2023-03">Март</a></li>
                            <li><a class="dropdown-item" href="?date=2023-04">Апрель</a></li>
                            <li><a class="dropdown-item" href="?date=2023-05">Май</a></li>
                            <li><a class="dropdown-item" href="?date=2023-06">Июнь</a></li>
                            <li><a class="dropdown-item" href="?date=2023-07">Июль</a></li>
                            <li><a class="dropdown-item" href="?date=2023-08">Август</a></li>
                            <li><a class="dropdown-item" href="?date=2023-09">Сентябрь</a></li>
                            <li><a class="dropdown-item" href="?date=2023-10">Октябрь</a></li>
                            <li><a class="dropdown-item" href="?date=2023-11">Ноябрь</a></li>
                            <li><a class="dropdown-item" href="?date=2023-12">Декабрь</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="d-grid gap-2">
        <a class="btn btn-danger" href="ins.php">Инструкция</a>
    </div>
    <ul class="list-group">
        <li class="list-group-item" style="padding: 0;">
            <img style="width: 100%;" class="mx-auto d-block" src="img/user_main.png?123">
            <?
if ($usr[admin] == "1" || $usr[name] == "RutBat") {
                ?>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Техник</th>
                        <th scope="col">Количество монтажей</th>
                        <th scope="col">Сумма денег</th>
                    </tr>
                    </thead>
                    <tbody>
<?
$sql = "SELECT * FROM `user` WHERE `region` = '" . $usr[region] . "' ORDER BY `id` desc";
$res_data = mysqli_query($connect, $sql);
while ($tech = mysqli_fetch_array($res_data)) {
?>
<tr>
                        <td><?=$tech[fio]?></td>
                        <td><?
                            num_montaj("$tech[fio]", "$month", 2023);
                            ?></td>
                        <td><?
                            summa_montaj("$tech[fio]", "$month", 2023);
                            ?></td>
                    </tr>
<?
}
?>
                    </tbody>
                </table>
                <?
            } else {
                ?>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Техник</th>
                        <th scope="col">Количество монтажей</th>
                        <th scope="col">Сумма денег</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td><?= $usr[fio]; ?></td>
                        <td><?
                            num_montaj("$usr[fio]", "$month", 2023);
                            ?></td>
                        <td><?
                            summa_montaj("$usr[fio]", "$month", 2023);
                            ?></td>
                    </tr>
                    </tbody>
                </table>
                <?
            }
?>
<div class="alert alert-info" role="alert">
Подписка активна до: <b><?= $usr['access_date'] ?></b>
</div>
<?php
if($usr[name] == 'RutBat'){
    echo'<div class="alert alert-warning" role="alert">
<b><a href = "adm_setting.php">Управление пользователями</a></b>
</div> ';
?>
<a href="https://vk.com/share.php?url=https://ardmoney.ru/hello.php&title=ArdMoney&image=https://ardmoney.ru/img/icon.png" target="_blank">Поделиться ВКонтакте</a>
<?
}


                            ?>

<div class="alert alert-danger" role="alert">
Суммы монтажей: <b><a href = "user_arhiv.php">За прошлый год</a></b>
</div>
<div class="alert alert-danger" role="alert">
Архив: <b><a href = "arhiv.php">За прошлый год</a></b>
</div>
<div class="alert alert-success" role="alert">
Регион: <b><?=$usr['region']?></b>
</div>
<div class="alert alert-info" role="alert">
Ваш логин: <b><?= $usr['name'] ?></b>
</div>
<div class="alert alert-success" role="alert" style="padding: 0px 20px 0px;">
  Приложение для Android <a href="ardmoney.apk" class="alert-link"><img src = "img/android.png" style="width: 32px;padding-bottom: 18px;" >ArdMoney</a>.
</div>
            <br>
            <b>
                <div class="d-grid gap-2">
                    <a href="/exit.php" class="btn btn-outline-success btn-sm">Выход</a>
                </div>
            </b>
        </li>
    </ul>
    </div>
<?php include 'inc/foot.php';
?>