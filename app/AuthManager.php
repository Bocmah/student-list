<?php
namespace StudentList;

class AuthManager
{
    /**
     * @param string $hash
     */
    public function logIn(string $hash)
    {
        setcookie("hash", $hash,time()+3600*24*365*10, "/", null, false,true);
    }
}