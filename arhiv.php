<?php
?>
<div class="alert alert-danger" role="alert">
!!Информация прошлого года!!
</div>
<?
include "inc/head.php";
AutorizeProtect();
access();
global $usr;
global $connect;
?>
<script src="js/popper.min.js"></script>
<head>
    <title>Список домов</title>
</head>
<style>
mark {
  background: orange;
  color: black;
}
</style>
<?
$lastyear = date('Y', strtotime('last year'));
if ($_GET[date] == "$lastyear-01") {
    $month = "Январь";
    $date_blyat = "$_GET[date]";
}
if ($_GET[date] == "$lastyear-02") {
    $month = "Февраль";
    $date_blyat = "$_GET[date]";
}
if ($_GET[date] == "$lastyear-03") {
    $month = "Март";
    $date_blyat = "$_GET[date]";
}
if ($_GET[date] == "$lastyear-04") {
    $month = "Апрель";
    $date_blyat = "$_GET[date]";
}
if ($_GET[date] == "$lastyear-05") {
    $month = "Май";
    $date_blyat = "$_GET[date]";
}
if ($_GET[date] == "$lastyear-06") {
    $month = "Июнь";
    $date_blyat = "$_GET[date]";
}
if ($_GET[date] == "$lastyear-07") {
    $month = "Июль";
    $date_blyat = "$_GET[date]";
}
if ($_GET[date] == "$lastyear-08") {
    $month = "Август";
    $date_blyat = "$_GET[date]";
}
if ($_GET[date] == "$lastyear-09") {
    $month = "Сентябрь";
    $date_blyat = "$_GET[date]";
}
if ($_GET[date] == "$lastyear-10") {
    $month = "Октябрь";
    $date_blyat = "$_GET[date]";
}
if ($_GET[date] == "$lastyear-11") {
    $month = "Ноябрь";
    $date_blyat = "$_GET[date]";
}
if ($_GET[date] == "$lastyear-12") {
    $month = "Декабрь";
    $date_blyat = "$_GET[date]";
}
if (!isset($_GET[date])) {
    //$month = getdate();
    //$month = $month[month];
    $month = date('m');
    if ($month = "01") {
        $month = "Январь";
        $date_blyat = "Январь";
    }elseif ($month = "02") {
        $month = "Февраль";
        $date_blyat = "Февраль";
    }
    elseif ($month = "03") {
        $month = "Март";
        $date_blyat = "Март";
    }
    elseif ($month = "04") {
        $month = "Апрель";
        $date_blyat = "Апрель";
    }
    elseif ($month = "05") {
        $month = "Май";
        $date_blyat = "Май";
    }
    elseif ($month = "06") {
        $month = "Июнь";
        $date_blyat = "Июнь";
    }
    elseif ($month = "07") {
        $month = "Июль";
        $date_blyat = "Июль";
    }
    elseif ($month = "08") {
        $month = "Август";
        $date_blyat = "Август";
    }
    elseif ($month = "09") {
        $month = "Сентябрь";
        $date_blyat = "Сентябрь";
    }
    elseif ($month = "10") {
        $month = "Октябрь";
        $date_blyat = "Октябрь";
    }
    elseif ($month = "11") {
        $month = "Ноябрь";
        $date_blyat = "Ноябрь";
    }
    elseif ($month = "12") {
        $month = "Декабрь";
        $date_blyat = "Декабрь";
    }
    $date = "$lastyear-01";
    $date_blyat = substr($date, 0, -3);
}
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"></a>
        <div class="navbar-collapse" id="navbarNavDarkDropdown">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button"
                       data-bs-toggle="dropdown" aria-expanded="false">
                        <?= $month ?>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                        <li><a class="dropdown-item" href="?date=<?=$lastyear?>-01">Январь</a></li>
                        <li><a class="dropdown-item" href="?date=<?=$lastyear?>-02">Февраль</a></li>
                        <li><a class="dropdown-item" href="?date=<?=$lastyear?>-03">Март</a></li>
                        <li><a class="dropdown-item" href="?date=<?=$lastyear?>-04">Апрель</a></li>
                        <li><a class="dropdown-item" href="?date=<?=$lastyear?>-05">Май</a></li>
                        <li><a class="dropdown-item" href="?date=<?=$lastyear?>-06">Июнь</a></li>
                        <li><a class="dropdown-item" href="?date=<?=$lastyear?>-07">Июль</a></li>
                        <li><a class="dropdown-item" href="?date=<?=$lastyear?>-08">Август</a></li>
                        <li><a class="dropdown-item" href="?date=<?=$lastyear?>-09">Сентябрь</a></li>
                        <li><a class="dropdown-item" href="?date=<?=$lastyear?>-10">Октябрь</a></li>
                        <li><a class="dropdown-item" href="?date=<?=$lastyear?>-11">Ноябрь</a></li>
                        <li><a class="dropdown-item" href="?date=<?=$lastyear?>-12">Декабрь</a></li>
                    </ul>
                </li>
                <?
if($usr[name] == 'test' or $usr[name] == 'test2'){
                ?>
<a href = "demo.php" style = "color: chartreuse;">Инструкция демо аккаунта</a>
<?}?>
            </ul>
        </div>
    </div>
</nav>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/mark.js/7.0.0/jquery.mark.min.js"></script>
<div class="input-group">
  <span class="input-group-text">Поиск</span>
  <input type="text" aria-label="адрес" class="form-control">
</div>
<div id="context">
<?php
if (isset($_GET[delete])) {
    $sql = " DELETE FROM montaj WHERE id = '$_GET[delete]'";
    if (mysqli_query($connect, $sql)) {
        red_index("index.php");
    } else {
        echo "Error deleting record: " . mysqli_error($connect);
    }
}
if ($_GET['id'] == "ok") {
    alrt("Успешно удаленно", "success", "2");
}
if ($usr[admin] == "1" || $usr[name] == "RutBat") {
    $sql = "SELECT * FROM `montaj` WHERE `region` = '" . $usr[region] . "' ORDER BY `id` desc";
} else {
    $sql = "
    SELECT * FROM `montaj` WHERE `region` = '" . $usr[region] . "' AND
     (
     `technik1` = '" . $usr[fio] . "' OR
     `technik2` = '" . $usr[fio] . "' OR
     `technik3` = '" . $usr[fio] . "' OR
     `technik4` = '" . $usr[fio] . "' OR
     `technik5` = '" . $usr[fio] . "' OR
     `technik6` = '" . $usr[fio] . "' OR
     `technik7` = '" . $usr[fio] . "' OR
     `technik8` = '" . $usr[fio] . "'
 ) ORDER BY `id` desc
 ";
}
$res_data = mysqli_query($connect, $sql);
while ($row = mysqli_fetch_array($res_data)) {
    ?>
    <!--Тут я поставил padding: 0.5rem 1.25rem;-->
    <a style="<?= $color ?>" href="result.php?vid_id=<?= $row['id'] ?>">
        <?
        $date = new DateTime;
        [$h, $m, $s] = explode(':', $date->format('H:i:s.u'));
        $cur_date = $h * 3600 + $m * 60 + $s;//секунды от полуночи
        $test = time() - strtotime($row['date']);//Секунды от времени добавления в базу
        if ($cur_date < $test) {
            $color = "black";
        } else {
            $color = "red";
        }
if($row['status'] == 1){
$color = "#22bd75";
$font = 'font-weight: bold;';
$img = "<img src = 'img/cool.png' width = '24px'>";
}else{
    $font = 'font-family: inherit;';
    $img = '';
}
        $data_tmp = substr($row[date], 0, -3);
        if ($data_tmp == $date_blyat) {
            ?>
            <li class="hui list-group-item d-flex justify-content-between align-items-center"
                style="padding: 7px 10px 5px 10px;">
                <label for="<?= $row['id'] ?>" style="color:<?= $color ?>; <?=$font?>">
                    <small class='form-text '><?= $row['date'] ?></small>
                    <? echo"$img";?> <?= $row['adress'] ?>
                    <small class='form-text '>
                        <?php echo $row['technik1'] . $row['technik2'] . $row['technik3'] . $row['technik4'] . $row['technik5']; ?>
                        : <?= $row['text'] ?>
                    </small>
                </label>
                <a href="?delete=<?= $row['id'] ?> "><span class="badge bg-danger rounded-pill">X</span></a>
            </li>
            <?
        }
        ?>
    </a>
    <?php
}
mysqli_close($connect);
?>
</div>
<div style="width: 100%;" class="btn-group" role="group" aria-label="Basic outlined example">
    <a href="montaj.php" class="btn btn-primary btn-lg">Добавить монтаж</a>
</div>
<!-- говорим браузеру, что сейчас начнётся скрипт -->
<script type="text/javascript">
$(function() {
  $("input").on("input.highlight", function() {
    // Determine specified search term
    var searchTerm = $(this).val();
    // Highlight search term inside a specific context
    $("#context").unmark().mark(searchTerm);
  }).trigger("input.highlight").focus();
});
</script>
</div>
<?php
include 'inc/foot.php';
?>
