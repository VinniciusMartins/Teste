<?php
 
class Db {

    public $con;
    
    public function __construct()
    {
        $this->con = new
        PDO('mysql:host=localhost;dbname=CRUD','root','');
    }
}
 