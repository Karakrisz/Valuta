<?php
// TODO weblap - mindennap lehúzza a magyar nemzeti bank oldaláról az aktuális valuta árfolyamot. 
require_once 'MnbRequester.php';
$mnbRequester = new MnbRequester();
$rates = $mnbRequester->request();
var_dump($rates);
// TODO adatbázis - tárolás dátummal ellátva

$mysqli = new mysqli('localhost', 'dev', '', 'rates') or die(mysqli_error($mysqli));
$mysqli->query("INSERT INTO rates (currency_id,rate,date) VALUES ('')") or
        die($mysqli->error);
// TODO lehessen bármilyen valutát bármire váltani és ezt is menteni kell adatbázisba dátummal ellátva.
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
    </body>
</html>
