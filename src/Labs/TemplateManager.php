<?php
/**
 * Created by IntelliJ IDEA.
 * User: mcstarioni
 * Date: 16.05.2018
 * Time: 14:39
 */
require "template.php";
require "navigation.php";
session_start();
function emptyFunction()
{
}
class TemplateManager
{
    private $empty = "emptyFunction";

    public static function isLogged()
    {
        if(isset($_SESSION["auth"])) {
            return $_SESSION["auth"];
        }else{
            return false;
        }
    }
    public static function setLogged($bool)
    {
        //session_start();
        $_SESSION["auth"] = $bool;
    }
    function getNavigation($content)
    {
        $this->getNavigationHeader($content,$this->empty);
    }
    function getNavigationHeader($content,$header)
    {
        getTemplate($content,$header,$this->getMenuFunction(),$this->getLoginFunction());
    }
    function getLoginFunction()
    {
        if($this->isLogged())
        {
            return 'getAuthBar';
        }
        else
        {
            return 'getNotAuthBar';
        }
    }
    function getMenuFunction()
    {
        return "getMainBar";
    }
}