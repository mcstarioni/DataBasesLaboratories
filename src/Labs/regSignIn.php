<?php
/**
 * Created by IntelliJ IDEA.
 * User: mcstarioni
 * Date: 10.05.2018
 * Time: 2:45
 */
$con = \server\Manager::getConnection();
$stmt = $con->prepare("SELECT login FROM users WHERE password = ? AND login = ?");
var_dump($_POST);
if($stmt->execute())
{

};