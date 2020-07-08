<?php

namespace App;

class App
{   //i db objekta sukuriame fileDB
    public static $db;
    public static $session;

    public function __construct(string $file_name)
    {
        self::$db = new \Core\FileDB($file_name);
        //sukurus FileDB objekta, iskart load metodas ateina
        //load mechanizmas paima ir uzloadina duombaze, ir patalpina i $this->$data
        self::$db->load();

        self::$session = new \Core\Session();
    }
    public function __destruct()
    {
        self::$db->save();
    }
}

?>