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
<form method="GET" action="add_plotnyak.php">
    <div class="list-group-item  justify-content-between align-items-center">
        <div class="mb-3">
            <div class="alert alert-success" role="alert">
                Ебани сюда свой платняк, шоб в конце месяца охуеть от того сколько денег ты проебал в никуда. <br>
                Только не наебись с цифрами, редактирование я писать не хочу.
</div>
            <div style="
    display: block;
    margin: auto;
    width: 100%;">
                <input autofocus list="provlist" name="plotnyak" class="form-control" required type="number" placeholder="Сколько деняк">
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