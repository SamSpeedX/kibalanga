<?php
namespace Kibalanga\Core;

class Session
{
    public static function start()
    {
        session_start();
        // Set secure session cookies
        if (ini_set('session.cookie_secure', 1) === false) {
            throw new \Exception("Unable to set secure session cookie flag");
        }
    }

    public static function get($key)
    {
        return $_SESSION[$key] ?? null;
    }

    public static function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }
}
