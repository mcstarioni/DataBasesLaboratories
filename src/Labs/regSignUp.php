<?php
/**
 * Created by IntelliJ IDEA.
 * User: mcstarioni
 * Date: 09.05.2018
 * Time: 22:46
 */
require_once "Manager.php";
require_once "TemplateManager.php";
if(TemplateManager::isLogged())
{
    $host  = $_SERVER['HTTP_HOST'];
    header("Location: http://".$_SERVER['HTTP_HOST']."/Web/src/Labs/signUp.php");
    exit;
}
if(checkUsername($_POST["Username"])) {
    $con = \server\Manager::getConnection();
    $stmt = $con->prepare("INSERT INTO users(name,surname,login,mail,password) VALUES(?,?,?,?,?)");
    $stmt->bind_param("sssss",
        $_POST["Name"],
        $_POST["Surname"],
        $_POST["Username"],
        $_POST["Mail"],
        $_POST["Password"]);
    $stmt->execute();
    $stmt->close();
    session_start();
    TemplateManager::setLogged(true);
    $_SESSION["Username"] = $_POST["Username"];
//    } else {
//        $_SESSION["LoginError"] = "Ошибка";
//    }
}
//var_dump(TemplateManager::isLogged());
//header('Location: '. $_SERVER['HTTP_REFERER']);
header("Location: http://".$_SERVER['HTTP_HOST']."/Web/src/Labs/signUp.php");
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
