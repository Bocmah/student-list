<?php
namespace StudentList\Helpers;

class Util
{
    public function generateHash(int $length = 32)
    {
        if ($length <= 8) {
            $length = 32;
        }
        return bin2hex(random_bytes($length));
    }
}
