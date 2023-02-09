<?php
session_start();
include "inc/head.php";
AutorizeProtect();
access();
global $connect;
global $usr;
?>
<head>
    <title>Информация о доме
        <?= $adress ?>
    </title>
</head>
<?
$id = $_GET[vid_id];
$montaj = $connect->query("SELECT * FROM `montaj` WHERE `id` = '" . $id . "' limit 1");
if ($montaj->num_rows != 0)
    $mon = $montaj->fetch_array(MYSQLI_ASSOC);
?>
<div class="section over-hide">
    <div class="123">
        <div class="row justify-content-center">
            <div class="col-12 text-center align-self-center">
                <?php
                    $filename = "img/screen/$mon[id].jpg";
                    $tim = filemtime("img/screen/$mon[id].jpg");
                    $ava = file_exists($filename) ? "img/screen/$mon[id].jpg?r=$tim" : "img/screen/test.png";
                    if ($ava != "img/screen/test.png") {
                        ?>
                <div class="d-grid gap-2">
                    <a href="result.php?vid_id=<?= $mon[id] ?>&delfoto" class="btn btn-danger btn-sm">Удалить
                        фото</a>
                </div>
                <?
                        if (isset($_GET['delfoto'])) {
                            unlink("img/screen/$mon[id].jpg");
                        }
                    }
                    ?>
<!--                 <div id="ava">
                    <span style="background: #45f977ab; display:block;">Если надо отрисовать, то можно прикрепить
                        фотку нажав сюда </span>
                            <img data-toggle="tooltip" data-placement="top" title="Для смены нажмите на изображение"
                                class="img-fluid mx-auto d-block" src="<?//= $ava ?>" alt="">
                </div> -->
<!--                 <div class="d-flex justify-content-center">
                    <div id="spiner" class="spinner-border" role="status" style="display:none;"></div>
                </div>
                <div class="press" style="display: none">
                    <form name="upload" action="download_img.php" method="POST" ENCTYPE="multipart/form-data">
                        <div class="input-group mb-3">
                            <input type="hidden" name="id" value="<?= $mon[id] ?>">
                            <input type="file" name="userfile" class="form-control" id="inputGroupFile02">
                            <input type="submit" name="upload" class="input-group-text" value="Загрузить"
                                onclick="(document.getElementById('spiner').style.display='block')">
                        </div>
                    </form>
                </div> -->
<!--                 <script>
                $('#ava').click(function() {
                    $('.press').show(); // Показывает содержимое диалога.
                });
                </script> -->
                <div class="section text-center py-md-0">
                    <span style="background: #45f977ab; display:block;">
                        <?= $mon[date] ?>
                        <b><?= $mon[adress] ?></b><br>
                        <?= $mon[text] ?>
                    </span>
                    <ol class="list-group list-group-numbered">
                        <style>
                        .single {
                            display: none;
                        }
                        .single.active {
                            display: block;
                        }
                        </style>
                        <?
                            $sql = "SELECT * FROM `array_montaj` WHERE mon_id = '$id'";
                            $results = mysqli_query($connect, $sql);
                            while ($vid_rabot = mysqli_fetch_array($results)) {
                                ?>
                        <li class="list-group-item d-flex justify-content-between align-items-start"
                            style="text-align: left;">
                            <div class="ms-2 me-auto">
                                <div class="fw-normal">
                                    <a style="color:black;"
                                        href="edit_array_montaj.php?id=<?= $vid_rabot[id] ?>&mon_id=<?= $id ?>&name=<?= $vid_rabot[name] ?>">
                                        <?= $vid_rabot[name] ?>(<?= $vid_rabot[count] ?>
                                        едениц)
                                    </a>
                                </div>
                                <?
                                        if ($vid_rabot[name] == "Другое") {
                                            ?>
                                <span class="text-muted fw-light"
                                    style="font-size: small;"><?= $vid_rabot[text] ?></span>
                                <?
                                        }
                                        ?>
                            </div>
                            <span class="badge bg-primary rounded-pill"><?= $vid_rabot[price] ?>р.</span>
                            <a href="edit_mon.php?delete=<?= $vid_rabot[id] ?>&mon_id=<?= $id ?>"><span
                                    class="badge bg-danger rounded-pill"><i class="fa fa-times"
                                        aria-hidden="true"></i></span></a>
                        </li>
                        <?
                            }
                            ?>
                        <span style="background: #ffffff;">
                            <?
echo "Сумма монтажей: $mon[summa] рублей <br>";
$tech1 = $mon['technik1'];
$tech2 = $mon['technik2'];
$tech3 = $mon['technik3'];
$tech4 = $mon['technik4'];
$tech5 = $mon['technik5'];
$tech6 = $mon['technik6'];
$tech7 = $mon['technik7'];
$tech8 = $mon['technik8'];
if (!empty($tech1)) {
    $ebat_code = 1;
    $who = $mon['technik1'];
}
if (!empty($tech2)) {
    $ebat_code = 2;
    $who = $mon[technik1] . "," . $mon[technik2];
}
if (!empty($tech3)) {
    $ebat_code = 3;
    $who = $mon[technik1] . "," . $mon[technik2] . "," . $mon[technik3];
}
if (!empty($tech4)) {
    $ebat_code = 4;
    $who = $mon[technik1] . "," . $mon[technik2] . "," . $mon[technik3] . "," . $mon[technik4];
}
if (!empty($tech5)) {
    $ebat_code = 5;
    $who = $mon[technik1] . "," . $mon[technik2] . "," . $mon[technik3] . "," . $mon[technik4] . "," . $mon[technik5];
}
if (!empty($tech6)) {
    $ebat_code = 6;
    $who = $mon[technik1] . "," . $mon[technik2] . "," . $mon[technik3] . "," . $mon[technik4] . "," . $mon[technik5] . "," . $mon[technik6];
}
if (!empty($tech7)) {
    $ebat_code = 7;
    $who = $mon[technik1] . "," . $mon[technik2] . "," . $mon[technik3] . "," . $mon[technik4] . "," . $mon[technik5]. "," . $mon[technik6]. "," . $mon[technik7];
}
if (!empty($tech8)) {
    $ebat_code = 8;
    $who = $mon[technik1] . "," . $mon[technik2] . "," . $mon[technik3] . "," . $mon[technik4]. "," . $mon[technik5]. "," . $mon[technik6]. "," . $mon[technik7]. "," . $mon[technik8];
}
echo "Делали: $who <br>";
echo " $mon[kajdomu] рублей каждому";
?>
                            <br>

                        </span>
                        <form method="GET" action="edit_mon.php">
                            <?
if($mon[status] == "1"){
$bg = "#9eff0994";
$status = "checked";
}else{
    $bg = "white";
    $status = "";
}
?>

<style>

.bootstrap-select > .dropdown-toggle.bs-placeholder, .bootstrap-select > .dropdown-toggle.bs-placeholder:hover, .bootstrap-select > .dropdown-toggle.bs-placeholder:focus, .bootstrap-select > .dropdown-toggle.bs-placeholder:active {
    color: #999;
    border: 1px solid #bfbdbd;
    padding: 1px;
    background: white;

    margin: 5px 10px 1px;

}

</style>
                            <div style="display:block;background: <?=$bg?>;padding: 10px;">
                                <div class="form-check form-switch" style="    display: inline-block;">
                                    <input name="status" class="form-check-input" type="checkbox"
                                        id="flexSwitchCheckChecked" <?=$status?>>
                                    <label class="form-check-label" for="flexSwitchCheckChecked">Подтвердили монтаж?</label>
                                </div>
                            <hr>
                            <small class='form-text '>Добавить вид работ и количество</small>
                            </div>





<style>

.g-3, .gy-3 {
background: #fff;
}
</style>
                            <div class="row g-3" >
                                <div class="col-9">
                                    <select class="selectpicker form-control" style="    background: white;" data-width="100%" data-container="body"
                                        title="Укажите монтаж" data-hide-disabled="true" data-width="auto"
                                        data-live-search="true" name='vid_rabot1' data-size="7">
                                        <?
                                                $sql = "SELECT * FROM `vid_rabot` ORDER BY `type_kabel`";
                                                $results = mysqli_query($connect, $sql);
                                                while ($vid_rabot = mysqli_fetch_array($results)) {
                                                        ?>
                                        <option style="color:<?= $vid_rabot[color] ?>;font-size: 9pt;"
                                            data-icon="<?= $vid_rabot[icon] ?>" value='<?= $vid_rabot[name] ?>'>
                                            <?= $vid_rabot["name"] ?></option>
                                        <?
                                                    }
                                                ?>
                                    </select>
                                </div>
                                <div class="col-3 block">
                                    <input name="count1" style = "
                                    color: #999;
                                    border: 1px solid #bfbdbd;
                                    padding: 1px;
                                    margin: 5px 0px 1px;
                                    background: white;
    " class="form-control form-control" type="text"
                                        placeholder="Количество" aria-label="Количество">
                                    <input name="mon_id" type="hidden" value="<?= $id ?>">
                                    <input name="summa" type="hidden" value="<?= $row_price_test ?>">
                                    <input name="kajdomu" type="hidden" value="<?= $kajdomu ?>">
                                </div>
                            </div>





                                                        <div class="row g-3">
                                <div class="col-9">
                                    <select class="selectpicker form-control" style="    background: white;" data-width="100%" data-container="body"
                                        title="Укажите монтаж" data-hide-disabled="true" data-width="auto"
                                        data-live-search="true" name='vid_rabot2' data-size="7">
                                        <?
                                                $sql = "SELECT * FROM `vid_rabot` ORDER BY `type_kabel`";
                                                $results = mysqli_query($connect, $sql);
                                                while ($vid_rabot = mysqli_fetch_array($results)) {
                                                        ?>
                                        <option style="color:<?= $vid_rabot[color] ?>;font-size: 9pt;"
                                            data-icon="<?= $vid_rabot[icon] ?>" value='<?= $vid_rabot[name] ?>'>
                                            <?= $vid_rabot["name"] ?></option>
                                        <?
                                                    }
                                                ?>
                                    </select>
                                </div>
                                <div class="col-3 block">
                                    <input name="count2" style = "
                                    color: #999;
                                    border: 1px solid #bfbdbd;
                                    padding: 1px;
                                    margin: 5px 0px 1px;
                                    background: white;
    "class="form-control form-control" type="text"
                                        placeholder="Количество" aria-label="Количество">
                                    <input name="mon_id" type="hidden" value="<?= $id ?>">
                                    <input name="summa" type="hidden" value="<?= $row_price_test ?>">
                                    <input name="kajdomu" type="hidden" value="<?= $kajdomu ?>">
                                </div>
                            </div>






                                                        <div class="row g-3">
                                <div class="col-9">
                                    <select class="selectpicker form-control" style="    background: white;" data-width="100%" data-container="body"
                                        title="Укажите монтаж" data-hide-disabled="true" data-width="auto"
                                        data-live-search="true" name='vid_rabot3' data-size="7">
                                        <?
                                                $sql = "SELECT * FROM `vid_rabot` ORDER BY `type_kabel`";
                                                $results = mysqli_query($connect, $sql);
                                                while ($vid_rabot = mysqli_fetch_array($results)) {
                                                        ?>
                                        <option style="color:<?= $vid_rabot[color] ?>;font-size: 9pt;"
                                            data-icon="<?= $vid_rabot[icon] ?>" value='<?= $vid_rabot[name] ?>'>
                                            <?= $vid_rabot["name"] ?></option>
                                        <?
                                                    }
                                                ?>
                                    </select>
                                </div>
                                <div class="col-3 block">
                                    <input name="count3" style = "
                                    color: #999;
                                    border: 1px solid #bfbdbd;
                                    padding: 1px;
                                    margin: 5px 0px 1px;
                                    background: white;
    " class="form-control form-control" type="text"
                                        placeholder="Количество" aria-label="Количество">
                                    <input name="mon_id" type="hidden" value="<?= $id ?>">
                                    <input name="summa" type="hidden" value="<?= $row_price_test ?>">
                                    <input name="kajdomu" type="hidden" value="<?= $kajdomu ?>">
                                </div>
                            </div>








                            <div class="row g-3">
                                <div class="col-9">
                                    <select class="selectpicker form-control" style="    background: white;" data-width="100%" data-container="body"
                                        title="Укажите монтаж" data-hide-disabled="true" data-width="auto"
                                        data-live-search="true" name='vid_rabot4' data-size="7">
                                        <?
                                                $sql = "SELECT * FROM `vid_rabot` ORDER BY `type_kabel`";
                                                $results = mysqli_query($connect, $sql);
                                                while ($vid_rabot = mysqli_fetch_array($results)) {
                                                        ?>
                                        <option style="color:<?= $vid_rabot[color] ?>;font-size: 9pt;"
                                            data-icon="<?= $vid_rabot[icon] ?>" value='<?= $vid_rabot[name] ?>'>
                                            <?= $vid_rabot["name"] ?></option>
                                        <?
                                                    }
                                                ?>
                                    </select>
                                </div>
                                <div class="col-3 block">
                                    <input name="count4" style = "
                                    color: #999;
                                    margin: 5px 0px 1px;
                                    border: 1px solid #bfbdbd;
                                    padding: 1px;
                                    background: white;
    " class="form-control form-control" type="text"
                                        placeholder="Количество" aria-label="Количество">
                                    <input name="mon_id" type="hidden" value="<?= $id ?>">
                                    <input name="summa" type="hidden" value="<?= $row_price_test ?>">
                                    <input name="kajdomu" type="hidden" value="<?= $kajdomu ?>">
                                </div>
                            </div>
                            <div id='Другое' class='single'>
                                <small class='form-text '>Напишите что делали и в графе количество укажите сумму за
                                    это</small>
                                <div class="input-group mb-3">
                                    <input name="other" type="text" class="form-control" placeholder="Что сделанно?)"
                                        aria-label="Сколько кабеля по коробу?" aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary btn-lg">Отправить данные</button>
                            </div>
                </div>
                </ol>
            </div>
        </div>
    </div>
</div>
</main>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.bundle.min.js"></script>
<script src="js/bootstrap-select.js"></script>
<script>
function showSingleDiv(selector) {
    const prevBlockEl = document.querySelector('.single.active'),
        currBlockEl = document.querySelector(selector);
    if (!currBlockEl || prevBlockEl === currBlockEl) return;
    prevBlockEl && prevBlockEl.classList.remove('active');
    currBlockEl.classList.add('active');
}
</script>
<?php
include 'inc/foot.php';
exit();
echo '</form></ul>';
include 'inc/foot.php';