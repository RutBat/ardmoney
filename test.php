<?php
include "inc/head.php";
AutorizeProtect();
access();
global $usr;
global $connect;
?>
<script src="js/popper.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/mark.js/7.0.0/jquery.mark.min.js"></script>
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

$month = date_view($_GET['date']);
$date_blyat = "$_GET[date]";
if (!isset($_GET[date]))
{
    $month = month_view(date('m'));
    $date = date("Y-m-d");
    $date_blyat = substr($date, 0, -3);
}
?>
<nav  class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"></a>
        <div class="navbar-collapse" id="navbarNavDarkDropdown">
            <ul class="navbar-nav" style="flex-direction: row;">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <?=$month
?>
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
                <?
if ($usr[admin] == "1" || $usr[name] == "RutBat")
{
    echo '<li class="nav-item dropdown" style = "padding-left: 20%;">';
    echo '<a class="nav-link dropdown-toggle" href="#" id="user_current" role="button" data-bs-toggle="dropdown" aria-expanded="false">';
    if (isset($_GET[current_user]))
    {
        echo " $_GET[current_user]";
    }
    else
    {
        echo 'Монтажи всех';
    }
    echo '</a>';
    echo '<ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">';
    $sq = "SELECT * FROM `user` WHERE `region` = '" . $usr[region] . "' ORDER BY `id` desc";
    $us = mysqli_query($connect, $sq);
    while ($cur_us = mysqli_fetch_array($us))
    {
        if (isset($_GET[date]))
        {
            echo "<li><a class='dropdown-item' href='?date=$_GET[date]&current_user=$cur_us[fio]'>$cur_us[fio]</a></li>";
        }
        else
        {
            echo "<li><a class='dropdown-item' href='?current_user=$cur_us[fio]'>$cur_us[fio]</a></li>";
        }
    }
    echo '</ul>';
    echo '</li>';
}
if ($usr[name] == 'test' or $usr[name] == 'test2')
{
    echo '<a href = "demo.php" style = "color: chartreuse;">Инструкция демо аккаунта</a>';
}
?>

            </ul>
        </div>
    </div>
</nav>

<?
if ($usr[region] == '10 - Москольцо')
{
    echo '<div class="d-grid gap-2 col-7 mx-auto">
  <a class="btn btn-success btn-sm" href = "plotnyak.php" >Добавить плотняк <img src = "/img/jew.png" width = "24px" ></a>
</div>';
}
if ($usr[demo] == 1)
{
    echo "<div class='alert alert-danger' role='alert'>
Тестовая подписка активна до <b>$usr[access_date]</b> <br>
Подробнее <a href = '/novoreg.php'>ТУТ</a>
</a></b>
</div>";
    $sql = "UPDATE user SET
demo = '0'
WHERE name = '$usr[name]'";
    if ($connect->query($sql) === true)
    {
    }
}
?>
<div class="input-group">
    <span class="input-group-text">Поиск</span>
    <input type="text" aria-label="адрес" class="form-control">
</div>
<div id="context">
    <?php
if (isset($_GET[delete]))
{
    $sql = " DELETE FROM montaj WHERE id = '$_GET[delete]'";
    if (mysqli_query($connect, $sql))
    {
        red_index("index.php");
    }
    else
    {
        echo "Error deleting record: " . mysqli_error($connect);
    }
}
if ($_GET['id'] == "ok")
{
    alrt("Успешно удаленно", "success", "2");
}

//////////Или кнопка показать неподтвержденные монтажи или код в sql
if (!isset($_GET[complete]))
{
    echo '<div class="d-grid gap-2 col-12 mx-auto">
  <a class="btn btn-danger btn-sm" href = "?complete" >Показать только неподтвержденные монтажи</a>
</div>';
}
else
{
    $view_complete = "AND `status` = '0'";
}

if ($usr[admin] == "1" || $usr[name] == "RutBat")
{
    $sql = "SELECT * FROM `montaj` WHERE `region` = '" . $usr[region] . "' " . $view_complete . " ORDER BY `id` desc";
}
else
{
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
 ) " . $view_complete . " ORDER BY `id` desc
 ";
}
if (isset($_GET['current_user']))
{
    $usr_mon = $_GET['current_user'];
    $sql = "SELECT * FROM `montaj` WHERE
     `technik1` = '" . $usr_mon . "' OR
     `technik2` = '" . $usr_mon . "' OR
     `technik3` = '" . $usr_mon . "' OR
     `technik4` = '" . $usr_mon . "' OR
     `technik5` = '" . $usr_mon . "' OR
     `technik6` = '" . $usr_mon . "' OR
     `technik7` = '" . $usr_mon . "' OR
     `technik8` = '" . $usr_mon . "'
  " . $view_complete . " ORDER BY `id` desc";
}

$res_data = mysqli_query($connect, $sql);
while ($row = mysqli_fetch_array($res_data))
{
?>
    <!--Тут я поставил padding: 0.5rem 1.25rem;-->
    <a style="<?=$color
?>" href="result.php?vid_id=<?=$row['id'] ?>">
        <?
    $date = new DateTime;
    [$h, $m, $s] = explode(':', $date->format('H:i:s.u'));
    $cur_date = $h * 3600 + $m * 60 + $s; //секунды от полуночи
    $test = time() - strtotime($row['date']); //Секунды от времени добавления в базу
    if ($cur_date < $test)
    {
        $color = "black";
    }
    else
    {
        $color = "red";
    }
    if ($row['status'] == 1)
    {
        $color = "#22bd75";
        $font = 'font-weight: bold;';
        $img = "<img src = 'img/cool.png' width = '24px'>";
    }
    else
    {
        $font = 'font-family: inherit;';
        $img = '';
    }
    $data_tmp = substr($row[date], 0, -3);
    if ($data_tmp == $date_blyat)
    {
?>
        <li class="hui list-group-item d-flex justify-content-between align-items-center"
            style="padding: 7px 10px 5px 10px;">
            <label for="<?=$row['id'] ?>" style="color:<?=$color ?>; <?=$font ?>">
                <small class='form-text '><?=$row['date'] ?></small>
                <? echo "$img"; ?> <?=$row['adress'] ?>
                <small class='form-text '>
                    <?php echo $row['technik1'] . $row['technik2'] . $row['technik3'] . $row['technik4'] . $row['technik5']; ?>
                    : <?=$row['text'] ?>
                </small>
            </label>
            <a href="?delete=<?=$row['id'] ?> "><span class="badge bg-danger rounded-pill">X</span></a>
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