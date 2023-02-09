<?php
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
if ($_GET[date] == "2023-01")
{
    $month = "Январь";
    $date_blyat = "$_GET[date]";
}
if ($_GET[date] == "2023-02")
{
    $month = "Февраль";
    $date_blyat = "$_GET[date]";
}
if ($_GET[date] == "2023-03")
{
    $month = "Март";
    $date_blyat = "$_GET[date]";
}
if ($_GET[date] == "2023-04")
{
    $month = "Апрель";
    $date_blyat = "$_GET[date]";
}
if ($_GET[date] == "2023-05")
{
    $month = "Май";
    $date_blyat = "$_GET[date]";
}
if ($_GET[date] == "2023-06")
{
    $month = "Июнь";
    $date_blyat = "$_GET[date]";
}
if ($_GET[date] == "2023-07")
{
    $month = "Июль";
    $date_blyat = "$_GET[date]";
}
if ($_GET[date] == "2023-08")
{
    $month = "Август";
    $date_blyat = "$_GET[date]";
}
if ($_GET[date] == "2023-09")
{
    $month = "Сентябрь";
    $date_blyat = "$_GET[date]";
}
if ($_GET[date] == "2023-10")
{
    $month = "Октябрь";
    $date_blyat = "$_GET[date]";
}
if ($_GET[date] == "2023-11")
{
    $month = "Ноябрь";
    $date_blyat = "$_GET[date]";
}
if ($_GET[date] == "2023-12")
{
    $month = "Декабрь";
    $date_blyat = "$_GET[date]";
}
if (!isset($_GET[date]))
{
    //$month = getdate();
    //$month = $month[month];
    $month = date('m');
    if ($month == "01")
    {
        $month = "Январь";
        $date_blyat = "Январь";
    }
    elseif ($month == "02")
    {
        $month = "Февраль";
        $date_blyat = "Февраль";
    }
    elseif ($month == "03")
    {
        $month = "Март";
        $date_blyat = "Март";
    }
    elseif ($month == "04")
    {
        $month = "Апрель";
        $date_blyat = "Апрель";
    }
    elseif ($month == "05")
    {
        $month = "Май";
        $date_blyat = "Май";
    }
    elseif ($month == "06")
    {
        $month = "Июнь";
        $date_blyat = "Июнь";
    }
    elseif ($month == "07")
    {
        $month = "Июль";
        $date_blyat = "Июль";
    }
    elseif ($month == "08")
    {
        $month = "Август";
        $date_blyat = "Август";
    }
    elseif ($month == "09")
    {
        $month = "Сентябрь";
        $date_blyat = "Сентябрь";
    }
    elseif ($month == "10")
    {
        $month = "Октябрь";
        $date_blyat = "Октябрь";
    }
    elseif ($month == "11")
    {
        $month = "Ноябрь";
        $date_blyat = "Ноябрь";
    }
    elseif ($month == "12")
    {
        $month = "Декабрь";
        $date_blyat = "Декабрь";
    }
    $date = date("Y-m-d");
    $date_blyat = substr($date, 0, -3);
}
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/mark.js/7.0.0/jquery.mark.min.js"></script>
<?
if ($usr[region] == '10 - Москольцо')
{
    echo '<div class="d-grid gap-2 col-7 mx-auto">
  <a class="btn btn-success btn-sm" href = "plotnyak.php" >Добавить плотняк <img src = "/img/jew.png" width = "24px" ></a>
</div>';
}

?>
<div class="alert alert-success" role="alert">
Твоих плотняков за <?=$month?> : <b><? summa_plotnyak("$usr[fio]", "$month", 2023); ?> руб.</b>
</div>
<!-- <div id="context"> -->
    <?php
if (isset($_GET[delete]))
{
    $sql = " DELETE FROM plotnyak WHERE id = '$_GET[delete]'";
    if (mysqli_query($connect, $sql))
    {
        red_index("plotnyak_list.php");
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

    if ($usr[admin] == "1" || $usr[name] == "RutBat")
    {
        $sql = "SELECT * FROM `plotnyak`  ORDER BY `id` desc";
    }
    else
    {
        $sql = "SELECT * FROM `plotnyak` WHERE
        `technik1` = '" . $usr[fio] . "' OR
        `technik2` = '" . $usr[fio] . "' OR
     `technik3` = '" . $usr[fio] . "' OR
     `technik4` = '" . $usr[fio] . "' OR
     `technik5` = '" . $usr[fio] . "' OR
     `technik6` = '" . $usr[fio] . "' OR
     `technik7` = '" . $usr[fio] . "' OR
     `technik8` = '" . $usr[fio] . "'
  ORDER BY `id` desc
 ";
    }

$res_data = mysqli_query($connect, $sql);
while ($row = mysqli_fetch_array($res_data))
{
?>
    <!--Тут я поставил padding: 0.5rem 1.25rem;-->

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
        <li class="list-group-item d-flex justify-content-between align-items-center"
            style="padding: 7px 10px 5px 10px;">
            <label for="<?=$row['id'] ?>" style="color:<?=$color ?>; <?=$font ?>">
                <small class='form-text '><?=$row['date'] ?></small>

                <small class='form-text '>По <color style="color: red;"><?=$row['plotnyak'] ?> </color> руб.
                    <?php echo $row['technik1'] . $row['technik2'] . $row['technik3'] . $row['technik4'] . $row['technik5']; ?>

                </small>
            </label>
            <a href="?delete=<?=$row['id'] ?> "><span class="badge bg-danger rounded-pill">X</span></a>
        </li>
        <?
    }

}
mysqli_close($connect);
?>
</div>


</div>
<?php
include 'inc/foot.php';
?>