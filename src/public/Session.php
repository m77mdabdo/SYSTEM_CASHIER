<?php

namespace Os\Test\public;

class Session
{

    public function __construct()
    {
        if(session_status() == PHP_SESSION_NONE){
            session_start(); 
        }
    }
    public function setSession($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public function getSession($key)
    {
        return $_SESSION[$key];
    }

    public function removeSession($key)
    {
        unset($_SESSION[$key]);
    }

    public function sessionDestroy()
    {
        session_destroy();
    }
    
}
