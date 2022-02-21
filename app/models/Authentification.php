<?php
require_once "Connection.php";
class Authentification
{
    private $table = "users";
    private $Fname;
    private $Lname;
    private $email;
    private $password;
    public function __construct($Fname, $Lname, $email, $password)
    {
        $this->Fname = $Fname;
        $this->Lname = $Lname;
        $this->email = $email;
        $this->password = $password;
    }

    public function save()
    {
        $ctn = new Connection();
        $ctn->insert($this->table,["Fname","Lname","email","password"]);
    }
    
}
