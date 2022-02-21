<?php

class Connection
{
    private $servername = "localhost";
    private $username = "root";
    private $dbname = "cinemaster";
    private $password = "";
    private $db;
    function connect()
    {
        try {
            $db = new PDO("mysql:host=" . $this->servername . ";dbname=" . $this->dbname, $this->username, $this->password);
            $db->exec("set names utf8");
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
            echo "Connected successfully";
            return $db;
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
    static public function insert($data)
    {
        $stmt = self::connect()->prepare('INSERT INTO users  (Fname,Lname,email,password) VALUES (:Fname,:Lname,:email,:password)');
        $stmt->bindParam(':Fname', $data['Fname']);
        $stmt->bindParam(':Lname', $data['Lname']);
        $stmt->bindParam(':email', $data['email']);
        $stmt->bindParam(':password', $data['password']);
        if ($stmt->execute()) {
            return 'ok';
        } else {
            return 'error';
        }
        $stmt->closeCursor();
        $stmt = null;
    }
}

// $con = new Connection();
// echo "
// ";
// if (in_array("mysql", PDO::getAvailableDrivers())) {
//     echo " You have PDO for MySQL driver installed ";
// } else {
//     echo "PDO driver for MySQL is not installed in your system";
// }
