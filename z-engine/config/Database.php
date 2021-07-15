<?php

class Database{

    public function __CONSTRUCT(){

        $_db_infos = require(dirname(dirname(__DIR__))."\config\Database_Config.php");

    }
}