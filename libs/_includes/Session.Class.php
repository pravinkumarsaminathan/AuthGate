<?php

class Session
{
    public static function start()
    {
        session_start();
    }

    public static function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public static function isset($key)
    {
        return isset($_SESSION[$key]);
    }


    public static function get($key, $default = null)
    {
        if (Session::isset($key))
            return $_SESSION[$key];
        else
            return $default;
    }

    public static function remove($key)
    {
        unset($_SESSION[$key]);
    }

    public static function clear()
    {
        session_write_close();
    }

    public static function destroy()
    {
        session_destroy();
    }

    public static function has($key)
    {
        return isset($_SESSION[$key]);
    }

    public static function unset($key)
    {
        session_unset();
    }
}