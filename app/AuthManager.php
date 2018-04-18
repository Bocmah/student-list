<?php
namespace StudentList;

class AuthManager
{
    /**
     * Logging user in by setting hash in cookies
     *
     * @param string $hash
     */
    public function logIn(string $hash)
    {
        setcookie("hash", $hash,time()+3600*24*365*10, "/", null, false,true);
    }

    /**
     * @return bool
     */
    public function checkIfAuthorized()
    {
        return isset($_COOKIE["hash"]) ? true : false;
    }

    /**
     * @return string|null
     */
    public function getHash()
    {
        return isset($_COOKIE["hash"]) ? $_COOKIE["hash"] : null;
    }
}