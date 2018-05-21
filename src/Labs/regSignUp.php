<?php
/**
 * Created by IntelliJ IDEA.
 * User: mcstarioni
 * Date: 09.05.2018
 * Time: 22:46
 */
require_once "./../TemplateManager.php";
if(TemplateManager::isLogged())
{
    $host  = $_SERVER['HTTP_HOST'];
    header("Location: http://".$host."signUp.php");
}
if(checkUsername($_POST["Username"])) {
    $con = \server\Manager::getConnection();
    $stmt = $con->prepare("INSERT INTO users(name,surname,login,mail,password) VALUES(?,?,?,?,?)");
    $stmt->bind_param("s", $_POST["Name"]);
    $stmt->bind_param("s", $_POST["Surname"]);
    $stmt->bind_param("s", $_POST["Username"]);
    $stmt->bind_param("s", $_POST["Mail"]);
    $stmt->bind_param("s", $_POST["Password"]);
    if ($stmt->execute())
    {
        TemplateManager::setLogged(true);
        $_SESSION["Username"] = $_POST["Username"];
    } else {
        $_SESSION["LoginError"] = "Ошибка";
    }
}
header('Location: ' . $_SERVER['HTTP_REFERER']);
exit;
function checkUsername($username):bool
{
    $con = \server\Manager::getConnection();
    $result = $con->query("SELECT * FROM users WHERE login = '".$username."'");
    if($result->fetch_assoc())
    {
        $_SESSION["LoginError"] = "Данное имя пользователя уже используется";
        return false;
    }
    return true;
}
