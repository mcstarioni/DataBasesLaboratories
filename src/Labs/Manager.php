<?php
/**
 * Created by IntelliJ IDEA.
 * User: mcstarioni
 * Date: 09.05.2018
 * Time: 22:52
 */

namespace server;


class Manager
{
    private static $connector = null;
    private static $connectorPi = null;
    static function getConnection():\mysqli
    {
        if(Manager::$connector != null)
        {
            return Manager::$connector;
        }
        else
        {
            Manager::$connector = new \mysqli("207.154.214.188", "max", "1613835m", "mirea");
            //Manager::$connector->set_charset("utf8");
            return Manager::$connector;
        }
    }
    static function getConnectionPi():\mysqli
    {
        if(Manager::$connector != null)
        {
            return Manager::$connector;
        }
        else
        {
            Manager::$connector = new \mysqli("nikitamedvedev.ddns.net", "nikita", "pass", "messenger");
            //Manager::$connector->set_charset("utf8");
            return Manager::$connector;
        }
    }
}