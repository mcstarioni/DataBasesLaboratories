<?php
/**
 * Created by IntelliJ IDEA.
 * User: mcstarioni
 * Date: 09.05.2018
 * Time: 17:43
 */
//$var = function ()
//{
//    echo "Hello world";
//};
//function call($arg)
//{
//    $arg();
//}
//call($var);

$mysqli = new mysqli("207.154.214.188", "max", "1613835m", "mirea");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
}
//$res =
$stmt = $mysqli->prepare("SELECT * FROM users;");
//$var = "alina";
//$stmt->bind_param("s",$var);
$i = 1;
$stmt->execute();
$res = $stmt->get_result();
while ($row = $res->fetch_assoc())
{
    echo $i++."\n";
    var_dump(json_encode(array($row)));
}
//..$values = $res->fetch_assoc();
//var_dump($values);

