<?php

class Database
{
    public static $conn = NULL;
    public static function getConnection()
    {
        if (Database::$conn == NULL)
        {
            $servername = get_config("server");
            $username = get_config("username");
            $password = get_config("password");
            $dbname = get_config("dbname");

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error)
            {
                die("Connection failed....".$conn->connect_error);
            }
            else
            {
                Database::$conn = $conn;
                return Database::$conn;
            }
        }
        else
        {
            return Database::$conn;
        }
    }

    public static function closeConnection()
    {
        if (Database::$conn != NULL)
        {
            Database::$conn->close();
            Database::$conn = NULL;
        }
    }

    public function __destruct()
    {
        self::closeConnection();
    }
}