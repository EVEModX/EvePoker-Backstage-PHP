<?php
require_once "../pconf/pconf.php";

/**
 * Created by PhpStorm.
 * User: mingl
 * Date: 2016/11/19
 * Time: 17:09:56
 */
class dbConn
{
    protected static $m_conn;

    /**
     * dbConn constructor.
     */
    public function __construct()
    {
        $tmp_cfgstr = getConf();
        $this::$m_conn = new mysqli($tmp_cfgstr['host'], $tmp_cfgstr['user'], $tmp_cfgstr['pass'], $tmp_cfgstr['defaultdb']);
        if ($this::$m_conn->errno)
        {
            throw new mysqli_sql_exception("Connection error!",$this::$m_conn->errno);
        }
    }

    /**
     * @return mysqli mysqli connection.
     */
    public function getSQLConnection()
    {
        return $this::$m_conn;
    }

    /**
     * dbConn destructor.
     */
    public function  __destruct()
    {
        $this::$m_conn->close();
    }

}
