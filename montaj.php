<?php
include "inc/head.php";
AutorizeProtect();
access();
global $connect;
global $usr;
?>
<head>
    <title>Добавить работу</title>
</head>
<form method="GET" action="add_mon.php">
    <div class="list-group-item  justify-content-between align-items-center">
        <div class="mb-3">
            <small class="form-text text-muted">
                Добавляет заявку в которую нужно вбить кто что делал. Указывай адрес где работал, на следующей
                странице добавляй что делал.
            </small>
            <div style="
    display: block;
    margin: auto;
    width: 100%;">
                <input autofocus list="provlist" type="text" name="adress" class="form-control" required
                    title="Введите от 4 символов" placeholder="Введите адрес">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label"><small class="form-text text-muted">Что
                        там делал(кратко) для ориентации в списках заявок</small></label>
                <textarea name="text" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            <br>
            <small class='form-text '>Кто был?</small>
            <?
$sql = "SELECT * FROM `user` WHERE `region` = '" . $usr[region] . "' ORDER BY `id` desc";
$res_data = mysqli_query($connect, $sql);
while ($tech = mysqli_fetch_array($res_data)) {
?>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="<?=$tech[fio]?>" name="technik[]"
                    id="flexCheckDefault<?=$tech[id]?>">
                <label class="form-check-label" for="flexCheckDefault<?=$tech[id]?>">
                    <?=$tech[fio]?>
                </label>
            </div>
            <?
}
?>
            <input type="hidden" value="<?=$usr[region]?>" name="region">
        </div>
        <br>
        <div class="d-grid gap-2">
            <button type="submit" class="btn bg-warning btn-lg">Добавить работу</button>
        </div>
    </div>
    </div>
</form>
<?php include 'inc/foot.php';