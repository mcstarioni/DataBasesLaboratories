<?php
/**
 * Created by PhpStorm.
 * User: mcstarioni
 * Date: 28.04.2018
 * Time: 19:39
 */

function SoapConnect()
{
    $url = "http://193.124.112.184/TTBT/ws/akiLISS.1cws?wsdl";
    $client = new SoapClient($url, array(
        "login"      => "ConnectToWebServices",
        "password"   => "ZxAs123",
        "trace"      => 1,
        "exceptions" => 0));
    return $client;
}
function getAllMedicines($client)
{
    $func_name = "GetfullMedicineList";
    $param = array(
        "VersionNum" => 0
    );
    return doSoap($client,$func_name,$param)->return;
}
function getMedicine($client,$uid)
{
    $funcName = "GetMedicineDescription";

    return doSoap($client,$funcName,array("MedicineUID" => $uid))->return;
}
function doSoap($client, $funcName, $args)
{
    $param = array_merge(array("PulseID" => 0),$args);
    return $client->$funcName($param);
}

$medicineOneUID = "09906840-7893-11e3-bd9e-005056b10012";
$medicineTwoUID = "576a6c22-519d-11e2-83b8-0025906b49b3";

$params = array("MedicineList" => json_encode(array("Колонки" => array("Medicine" => "Строка"),
    "Строки" => array(array("Medicine" => $medicineTwoUID),array( "Medicine" => $medicineOneUID)))));
$client = SoapConnect();
var_dump(doSoap($client,"GetMedicineInteraction",$params)->return);

