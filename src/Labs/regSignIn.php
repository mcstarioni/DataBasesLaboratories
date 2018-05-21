<?php
/**
 * Created by IntelliJ IDEA.
 * User: mcstarioni
 * Date: 10.05.2018
 * Time: 2:45
 */
require_once "TemplateManager.php";
require_once "Manager.php";
$con = server\Manager::getConnection();
$stmt = $con->prepare("SELECT login FROM users WHERE password = ? AND login = ?");
$stmt->bind_param("ss",$_POST["Password"],$_POST["Username"]);
$stmt->execute();
//var_dump($_POST);
if($stmt->get_result()->fetch_assoc())
{
    session_start();
    TemplateManager::setLogged(true);
    $_SESSION["Username"] = $_POST["Username"];
    header("Location: http://".$_SERVER['HTTP_HOST']."/Web/src/Labs/signIn.php");
    exit;
}
else
{
    echo "shitt";
    //TemplateManager::setLogged(false);
    //$_["LoginError"] = true;
}
