<?php
/**
 * Created by IntelliJ IDEA.
 * User: mcstarioni
 * Date: 10.05.2018
 * Time: 2:09
 */
//setcookie()

require_once "TemplateManager.php";
session_unset();
session_destroy();
setcookie("PHPSESSID",session_id(),time()-3600);
//var_dump(time());
header("Location: http://".$_SERVER['HTTP_HOST']."/Web/src/Labs/signIn.php");
exit;