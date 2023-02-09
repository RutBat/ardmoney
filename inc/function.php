<?php
session_start();
include('db.php');
function del_mon($id){
global $connect;
$sql = "DELETE FROM array_montaj WHERE id = '$id'";
if (mysqli_query($connect, $sql)) {
} else {echo "Error deleting record: " . mysqli_error($connect);}
}
function edit_montaj_vidrabot($id_vid_rabot, $name, $new_name, $count){
  global $connect;
    $vid_montaj = $connect->query("SELECT * FROM `vid_rabot` WHERE `name` = '" . $name . "' limit 1");
    if ($vid_montaj->num_rows != 0) $vid_mon = $vid_montaj->fetch_array(MYSQLI_ASSOC);
if($vid_mon['price_tech'] == 0){
    $pric = 1;
}else{
    $pric = $vid_mon['price_tech'];
}
    $price = $pric * $count;
    $sql1 = "UPDATE array_montaj SET
count = '$count',
name = '$new_name',
price = '$price'
WHERE id = '$id_vid_rabot'";
    if ($connect->query($sql1) === true)
    {
    }
    else
    {
        echo "Ошибка: " . $sql1 . "<br>" . $connect->error;
    }
}
function edit_montaj_summa($id_montaj ,$status){
global $connect;
    //хуета считает сумму монтажей из базы
    $sql = "SELECT SUM(price) AS count
    FROM array_montaj
    WHERE mon_id = '$id_montaj'";
    $duration = $connect->query($sql);
    $record = $duration->fetch_array();
    $summa = $record['count'];
    $montaj = $connect->query("SELECT * FROM `montaj` WHERE `id` = '" . $id_montaj . "' limit 1");
    if ($montaj->num_rows != 0) $mon = $montaj->fetch_array(MYSQLI_ASSOC);
    $tech1 = $mon['technik1'];
    $tech2 = $mon['technik2'];
    $tech3 = $mon['technik3'];
    $tech4 = $mon['technik4'];
    $tech5 = $mon['technik5'];
    $tech6 = $mon['technik6'];
    $tech7 = $mon['technik7'];
    $tech8 = $mon['technik8'];
    if (!empty($tech1))
    {
        $ebat_code = 1;
    }
    if (!empty($tech2))
    {
        $ebat_code = 2;
    }
    if (!empty($tech3))
    {
        $ebat_code = 3;
    }
    if (!empty($tech4))
    {
        $ebat_code = 4;
    }
    if (!empty($tech5))
    {
        $ebat_code = 5;
    }
    if (!empty($tech6))
    {
        $ebat_code = 6;
    }
    if (!empty($tech7))
    {
        $ebat_code = 7;
    }
    if (!empty($tech8))
    {
        $ebat_code = 8;
    }
if($status == "2"){
    $status = $mon['status'];
}
    $kajdomu = $summa / $ebat_code;
    $kajdomu = round($kajdomu, 2);
    $sql2 = "UPDATE montaj SET
summa = '$summa',
status = '$status',
kajdomu = '$kajdomu'
WHERE id = '$id_montaj'";
    if ($connect->query($sql2) === true)
    {
        //red_index("result.php?vid_id=$id_montaj");
    }
    else
    {
        echo "Ошибка: " . $sql . "<br>" . $connect->error;
    }
}
function summa_plotnyak($var1, $var2, $var3){
    global $connect;
$month = date('m');//12
    if($var2 == "Январь"){
$zap_date = 1;
    }
    if($var2 == "Февраль"){
$zap_date = 2;
    }
        if($var2 == "Март"){
$zap_date = 3;
    }
        if($var2 == "Апрель"){
$zap_date = 4;
    }
        if($var2 == "Май"){
$zap_date = 5;
    }
        if($var2 == "Июнь"){
$zap_date = 6;
    }
        if($var2 == "Июль"){
$zap_date = 7;
    }
        if($var2 == "Август"){
$zap_date = 8;
    }
        if($var2 == "Сентябрь"){
$zap_date = 9;
    }
        if($var2 == "Октябрь"){
$zap_date = 10;
    }
        if($var2 == "Ноябрь"){
$zap_date = 11;
    }
        if($var2 == "Декабрь"){
$zap_date = 12;
    }
//$raznica = $month - $zap_date;
//хуета считает сумму платняка из базы
$sql1 = "SELECT SUM(plotnyak) AS count
    FROM plotnyak
    WHERE technik1 = '$var1' AND (MONTH(`date`) = $zap_date AND YEAR(`date`) = $var3)";
// -1 это меясц назад
$duration1 = $connect->query($sql1);
$record1 = $duration1->fetch_array();
$summa1 = $record1['count'];
$sql2 = "SELECT SUM(plotnyak) AS count
    FROM plotnyak
    WHERE technik2 = '$var1' AND (MONTH(`date`) = $zap_date AND YEAR(`date`) = $var3)";
$duration2 = $connect->query($sql2);
$record2 = $duration2->fetch_array();
$summa2 = $record2['count'];
$sql3 = "SELECT SUM(plotnyak) AS count
    FROM plotnyak
    WHERE technik3 = '$var1' AND (MONTH(`date`) = $zap_date AND YEAR(`date`) = $var3)";
$duration3 = $connect->query($sql3);
$record3 = $duration3->fetch_array();
$summa3 = $record3['count'];
$sql4 = "SELECT SUM(plotnyak) AS count
    FROM plotnyak
    WHERE technik4 = '$var1' AND (MONTH(`date`) = $zap_date AND YEAR(`date`) = $var3)";
$duration4 = $connect->query($sql4);
$record4 = $duration4->fetch_array();
$summa4 = $record4['count'];
$sql5 = "SELECT SUM(plotnyak) AS count
    FROM plotnyak
    WHERE technik5 = '$var1' AND (MONTH(`date`) = $zap_date AND YEAR(`date`) = $var3)";
$duration5 = $connect->query($sql5);
$record5 = $duration5->fetch_array();
$summa5 = $record5['count'];
$sql6 = "SELECT SUM(plotnyak) AS count
    FROM plotnyak
    WHERE technik6 = '$var1' AND (MONTH(`date`) = $zap_date AND YEAR(`date`) = $var3)";
$duration6 = $connect->query($sql6);
$record6 = $duration6->fetch_array();
$summa6 = $record6['count'];
$sql7 = "SELECT SUM(plotnyak) AS count
    FROM plotnyak
    WHERE technik7 = '$var1' AND (MONTH(`date`) = $zap_date AND YEAR(`date`) = $var3)";
$duration7 = $connect->query($sql7);
$record7 = $duration7->fetch_array();
$summa7 = $record7['count'];
$sql8 = "SELECT SUM(plotnyak) AS count
    FROM plotnyak
    WHERE technik8 = '$var1' AND (MONTH(`date`) = $zap_date AND YEAR(`date`) = $var3)";
$duration8 = $connect->query($sql8);
$record8 = $duration8->fetch_array();
$summa8 = $record8['count'];
$summa = $summa1 + $summa2 + $summa3 + $summa4 + $summa5 + $summa6 + $summa7 + $summa8;
echo"$summa";
}
function summa_montaj($var1, $var2, $var3){
    global $connect;
$month = date('m');//12
    if($var2 == "Январь"){
$zap_date = 1;
    }
    if($var2 == "Февраль"){
$zap_date = 2;
    }
        if($var2 == "Март"){
$zap_date = 3;
    }
        if($var2 == "Апрель"){
$zap_date = 4;
    }
        if($var2 == "Май"){
$zap_date = 5;
    }
        if($var2 == "Июнь"){
$zap_date = 6;
    }
        if($var2 == "Июль"){
$zap_date = 7;
    }
        if($var2 == "Август"){
$zap_date = 8;
    }
        if($var2 == "Сентябрь"){
$zap_date = 9;
    }
        if($var2 == "Октябрь"){
$zap_date = 10;
    }
        if($var2 == "Ноябрь"){
$zap_date = 11;
    }
        if($var2 == "Декабрь"){
$zap_date = 12;
    }
//$raznica = $month - $zap_date;
//хуета считает сумму монтажей из базы
$sql1 = "SELECT SUM(kajdomu) AS count
    FROM montaj
    WHERE technik1 = '$var1' AND (MONTH(`date`) = $zap_date AND YEAR(`date`) = $var3)";
// -1 это меясц назад
$duration1 = $connect->query($sql1);
$record1 = $duration1->fetch_array();
$summa1 = $record1['count'];
$sql2 = "SELECT SUM(kajdomu) AS count
    FROM montaj
    WHERE technik2 = '$var1' AND (MONTH(`date`) = $zap_date AND YEAR(`date`) = $var3)";
$duration2 = $connect->query($sql2);
$record2 = $duration2->fetch_array();
$summa2 = $record2['count'];
$sql3 = "SELECT SUM(kajdomu) AS count
    FROM montaj
    WHERE technik3 = '$var1' AND (MONTH(`date`) = $zap_date AND YEAR(`date`) = $var3)";
$duration3 = $connect->query($sql3);
$record3 = $duration3->fetch_array();
$summa3 = $record3['count'];
$sql4 = "SELECT SUM(kajdomu) AS count
    FROM montaj
    WHERE technik4 = '$var1' AND (MONTH(`date`) = $zap_date AND YEAR(`date`) = $var3)";
$duration4 = $connect->query($sql4);
$record4 = $duration4->fetch_array();
$summa4 = $record4['count'];
$sql5 = "SELECT SUM(kajdomu) AS count
    FROM montaj
    WHERE technik5 = '$var1' AND (MONTH(`date`) = $zap_date AND YEAR(`date`) = $var3)";
$duration5 = $connect->query($sql5);
$record5 = $duration5->fetch_array();
$summa5 = $record5['count'];
$sql6 = "SELECT SUM(kajdomu) AS count
    FROM montaj
    WHERE technik6 = '$var1' AND (MONTH(`date`) = $zap_date AND YEAR(`date`) = $var3)";
$duration6 = $connect->query($sql6);
$record6 = $duration6->fetch_array();
$summa6 = $record6['count'];
$sql7 = "SELECT SUM(kajdomu) AS count
    FROM montaj
    WHERE technik7 = '$var1' AND (MONTH(`date`) = $zap_date AND YEAR(`date`) = $var3)";
$duration7 = $connect->query($sql7);
$record7 = $duration7->fetch_array();
$summa7 = $record7['count'];
$sql8 = "SELECT SUM(kajdomu) AS count
    FROM montaj
    WHERE technik8 = '$var1' AND (MONTH(`date`) = $zap_date AND YEAR(`date`) = $var3)";
$duration8 = $connect->query($sql8);
$record8 = $duration8->fetch_array();
$summa8 = $record8['count'];
$summa = $summa1 + $summa2 + $summa3 + $summa4 + $summa5 + $summa6 + $summa7 + $summa8;
echo"$summa";
}
function num_montaj($var1, $var2, $var3){
    global $connect;
    if($var2 == "Январь"){
$zap_date = 1;
    }
    if($var2 == "Февраль"){
$zap_date = 2;
    }
        if($var2 == "Март"){
$zap_date = 3;
    }
        if($var2 == "Апрель"){
$zap_date = 4;
    }
        if($var2 == "Май"){
$zap_date = 5;
    }
        if($var2 == "Июнь"){
$zap_date = 6;
    }
        if($var2 == "Июль"){
$zap_date = 7;
    }
        if($var2 == "Август"){
$zap_date = 8;
    }
        if($var2 == "Сентябрь"){
$zap_date = 9;
    }
        if($var2 == "Октябрь"){
$zap_date = 10;
    }
        if($var2 == "Ноябрь"){
$zap_date = 11;
    }
        if($var2 == "Декабрь"){
$zap_date = 12;
    }
$raznica = $month - $zap_date;
            $results1    = $connect->query("SELECT * FROM montaj WHERE technik1 LIKE '$var1' AND (MONTH(`date`) = '$zap_date' AND YEAR(`date`) = '$var3')");
            $results2    = $connect->query("SELECT * FROM montaj WHERE technik2 LIKE '$var1' AND (MONTH(`date`) = '$zap_date' AND YEAR(`date`) = '$var3')");
            $results3    = $connect->query("SELECT * FROM montaj WHERE technik3 LIKE '$var1' AND (MONTH(`date`) = '$zap_date' AND YEAR(`date`) = '$var3')");
            $results4    = $connect->query("SELECT * FROM montaj WHERE technik4 LIKE '$var1' AND (MONTH(`date`) = '$zap_date' AND YEAR(`date`) = '$var3')");
            $results5    = $connect->query("SELECT * FROM montaj WHERE technik5 LIKE '$var1' AND (MONTH(`date`) = '$zap_date' AND YEAR(`date`) = '$var3')");
            $results6    = $connect->query("SELECT * FROM montaj WHERE technik6 LIKE '$var1' AND (MONTH(`date`) = '$zap_date' AND YEAR(`date`) = '$var3')");
            $results7    = $connect->query("SELECT * FROM montaj WHERE technik7 LIKE '$var1' AND (MONTH(`date`) = '$zap_date' AND YEAR(`date`) = '$var3')");
            $results8    = $connect->query("SELECT * FROM montaj WHERE technik8 LIKE '$var1' AND (MONTH(`date`) = '$zap_date' AND YEAR(`date`) = '$var3')");
            $num_montaj1 =  $results1->num_rows;
            $num_montaj2 =  $results2->num_rows;
            $num_montaj3 =  $results3->num_rows;
            $num_montaj4 =  $results4->num_rows;
            $num_montaj5 =  $results5->num_rows;
            $num_montaj6 =  $results6->num_rows;
            $num_montaj7 =  $results7->num_rows;
            $num_montaj8 =  $results8->num_rows;
            $num_montaj = $num_montaj1 + $num_montaj2 + $num_montaj3 + $num_montaj4 + $num_montaj5 + $num_montaj6 + $num_montaj7 + $num_montaj8;
echo"$num_montaj";
}
function alrt($text, $why, $tim) //Уведомления
{
    ?>
    <script>
        setTimeout(function () {
            $('#hidenahoy').fadeOut();
        }, <?=$tim?>000)
    </script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <div id="hidenahoy" role="alert">
        <div class="alert alert-<?= $why ?>">
            <?= $text ?>
        </div>
    </div>
    <?php
}
function e($string)
{
    return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
}
function h($string)
{
    return htmlentities($string, ENT_QUOTES, 'UTF-8');
}
function red_index($url) // редирект моментальный
{
    $url = htmlentities($url);
    echo '<meta http-equiv="refresh" content="0;URL=' . "$url" . '">';
}
function redir($url, $tim) // редирект с задержкой
{
    $url = htmlentities($url);
    $tim = htmlentities($tim);
    ?>
    <meta http-equiv="refresh" content="<?= $tim ?>;URL=<?= $url ?>">
    <?php
}
function preloader() //Первый вход на сайт (прелоадер)
{
    ?>
    <div id="p_prldr">
        <div class="contpre">
            <br>
            <img src="img/logo.png" alt="Логотип загрузки">
            <br>
            <br>
            <br>
            <div class="d-flex justify-content-center">
                <div class="spinner-border" role="status"></div>
            </div>
        </div>
    </div>
    <?
}
$user = htmlentities($_COOKIE['user']);
global $connect;
$user = $connect->query("SELECT * FROM `user` WHERE `name` = '" . $user . "'");
if ($user->num_rows != 0)
    $usr = $user->fetch_array(MYSQLI_ASSOC);
function AutorizeProtect() // Прошел ли пользователь проверку
{
    if (checkAccess() === false) {
        ?>
        <script type="text/javascript">
            document.location.replace("/auth.php");
        </script>
        <?
        exit;
    }
}
function checkAccess() // Проверка пользователя на авторизацию через базу данных
{
    global $connect;
    $name = $_COOKIE['user'];
    $pass = $_COOKIE['pass'];
    if (empty($_COOKIE['user'])) {
        $name = "TestUser123";
    }//Вынужденый костыль (при отсутствии логина в базе приставаивает логин пустышку)
    if (empty($_COOKIE['pass'])) {
        $pass = "TestPass123";
    }//Вынужденый костыль (при отсутствии пароля в базе приставаивает пароль пустышку
    $user = $connect->query("SELECT * FROM `user` WHERE `name` = '" . $name . "' and `pass` = '" . $pass . "' and `reger` = 1");
    $auth = !($user->num_rows == 0);
    return $auth;
}
function access()
{
global $usr;
$current_date = date('y-m-d');
$access = $usr['access_date'];
$current_date = strtotime($current_date);
$access = strtotime($access);
if($access < $current_date){
?>
<div class="card">
  <div class="card-header">
    Важное уведомление!
  </div>
  <div class="card-body">
    <h5 class="card-title">К большому сожалению у вас закончилась подписка. Это не бесплатное ПО. Дата подписки указана в странице пользователя.</h5>
    <p class="card-text">Месячная подписка стоит <b>200р/мес.</b> Все деньги будут уходить в оплату хостинга и кофе.</p>
<hr>
<h5>Как оплатить?</h5>
<br>
<p class="card-text">Можно скинуть на любую из карт прямым переводом или по номеру телефона через СБП:</p>
<img src="img/sbp.png" alt="" width="48px"> <b>+7(978)945-84-18</b><br>
<img src="img/rnkb.png" alt="" width="48px"><b>РНКБ 2200 0202 2350 3329</b><br>
<a href="https://www.tinkoff.ru/cf/AwmNLM8eFAA"><img src="img/tinkoff.png" alt="" width="48px"><b style = "color: black;">Tinkoff(ссылка)</a> 2200 7004 9478 7426</b><br><hr>
<p class="card-text">После оплаты обязательно напишите любым удобным для вас способом администратору:</p>
<p class="card-text">Пример текста:</p>
<p class="fst-italic"><b>Оплатил подписку доступа в приложение  ArdMoney, оплачивал через РНКБ в <? echo date('y-m-d h:m');?>, моё Ф.И.О. <?=$usr[fio];?></b></p>
<a href="https://wa.me/79789458418?text=Привет! Я оплатил подписку ArdMoney. Проверь пожалуйста. Меня зовут - <?=$usr[fio];?>"><img src="img/whatsapp.png" alt="" width="100px"></a><br><br>
<a href="https://rutbat.t.me"><img src="img/telegram.png" alt="" width="100px"></a><br><br>
<a href="httpd://rutbat.t.me"><img src="img/vk.png" alt="" width="100px"></a><br><br>
<a href="tel:79789458418"><img src="img/sms.png" alt="" width="42px">+7(978)945-84-18</a><br>
<br>
После того как пройдет оплата администратор продлит доступ. Имейте терпение продление в ручном режиме.
<br><br><br>
  </div>
</div>
<?
include('foot.php');
exit;
}
}
function month_view ($month)
{
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
    return  $month;
}

function date_view ($date)
{
if ($date == "2023-01")
{
    $month = "Январь";
}
if ($date == "2023-02")
{
    $month = "Февраль";
}
if ($date == "2023-03")
{
    $month = "Март";
}
if ($date == "2023-04")
{
    $month = "Апрель";
}
if ($date == "2023-05")
{
    $month = "Май";
}
if ($date == "2023-06")
{
    $month = "Июнь";
}
if ($date == "2023-07")
{
    $month = "Июль";
}
if ($date == "2023-08")
{
    $month = "Август";
}
if ($date == "2023-09")
{
    $month = "Сентябрь";
}
if ($date == "2023-10")
{
    $month = "Октябрь";
}
if ($date == "2023-11")
{
    $month = "Ноябрь";
}
if ($date == "2023-12")
{
    $month = "Декабрь";
}
    return  $month;
}