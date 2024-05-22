<?php
class LoadIni
{

    private $ini_data;
    public $DATABASE_USERNAME;
    public $DATABASE_PASSWORD;
    public $DATABASE_NAME;
    public function __construct()
    {
        $this->ini_data = parse_ini_file(__DIR__ . '/../setting/env.ini', true);
        $this->DATABASE_USERNAME = $this->ini_data['database']['DATABASE_USERNAME'];
        $this->DATABASE_PASSWORD = $this->ini_data['database']['DATABASE_PASSWORD'];
        $this->DATABASE_NAME = $this->ini_data['database']['DATABASE_NAME'];
    }
    public function get($index)
    {
        ///DATABASE_USERNAME
        //DATABASE_PASSWORD
        //DATABASE_NAME
        return $this->ini_data[$index];

    }
    public function getAll()
    {
        ///DATABASE_USERNAME
        //DATABASE_PASSWORD
        //DATABASE_NAME
        return $this->ini_data;

    }
}
?>