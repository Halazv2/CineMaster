<?php

// use LDAP\Connection;
require_once "Connection.php";
class Post
{
    protected $db;
    function __construct()
    {
        $this->db = (new Connection())->db;
        // $db->connect();
    }
    public function getPosts()
    {
        $stmt = $this->db->prepare('SELECT 
                            posts.id as post_id,
                            users.id as usre_id,
                            users.first_name as user,
                            posts.title as title,
                            posts.photo as photo,
                            posts.description as description,
                            posts.category as category
                            FROM posts
                            INNER JOIN users
                            ON posts.user_id= users.id
                            ORDER BY posts.id DESC');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function addPost($table, $data, $user_id)
    {
        // var_dump($data);
        // var_dump($user_id);
        $query = $this->db->prepare("INSERT INTO $table (`user_id`,`title`, `photo`, `description`, `category`) values ('$user_id',:title, :photo, :description, :category)");
        //execute 
        return $query->execute($data);
    }



    // public function selectPosts($table)
    // {
    //     $query=$this->db->prepare("SELECT * FROM `$table`");
    //     $query-> execute();
    //     return $query->fetchAll(PDO::FETCH_OBJ);
    // }

}
