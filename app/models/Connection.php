<?php


class Connection
{
    public $servername = "localhost";
    public $username = "root";
    public $dbname = "cinemaster";
    public $password = "";
    public $db;
    public function __construct()
    {
        try {
            $this->db = new PDO("mysql:host=" . $this->servername . ";dbname=" . $this->dbname, $this->username, $this->password);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
            // echo "Connected successfully";
            // return $this->db;
        } catch (PDOException $e) {
            // echo "Connection failed: " . $e->getMessage();
        }
    }
    public function insert($table, $data)
    {
        $keys = array_keys($data);

        $columns = implode(",", $keys);

        $placeholders = implode(",", array_map(function ($key) {
            return ":$key";
        }, $keys));

        $query = $this->db->prepare("insert into $table ($columns) values ($placeholders)");
        return $query->execute($data);
        // var_dump($query->execute($data));
        // echo $query.PHP_EOL;

    }

    public function selectOne($table, $data)
    {
        $query = $this->db->prepare("SELECT * FROM `$table` where email = :email");
        // $query->bindParam(':email', $this->data["email"], PDO::PARAM_STR);
        $query->execute($data);
        return $query->fetchAll(PDO::FETCH_OBJ)[0];
    }
    public function execute()
    {
        return $this->stmt->execute();
    }


}

// $con = new Connection();

// $con->insert("users", ["Fname", "Lname", "email", "password"], ["hala", "ziani", "halaziani@gmail.com", "halaz"]);
// echo "
// ";
// if (in_array("mysql", PDO::getAvailableDrivers())) {
//     echo " You have PDO for MySQL driver installed ";
// } else {
//     echo "PDO driver for MySQL is not installed in your system";
// }
