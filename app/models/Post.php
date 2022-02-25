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
                            users.id as user_id,
                            users.first_name as user,
                            posts.title as title,
                            posts.photo as image,
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
        $query = $this->db->prepare("INSERT INTO $table (`user_id`,`title`, `photo`, `description`, `category`)
                                    values ('$user_id',:title, :photo, :description, :category)");
        return $query->execute($data);
    }

    public function deletePost($table, $data)
    {
        // var_dump($data);
        // var_dump($post_id);
        $query = $this->db->prepare("DELETE FROM $table WHERE `id`=:post_id");
        return $query->execute($data);
    }

    public function editPost($table, $data)
    {
        $query = $this->db->prepare("UPDATE $table SET
                                    `title`=:title,
                                    `photo`=:photo,
                                    `description`=:description,
                                    `category`=:category 
                                    WHERE `id`=:post_id");
        var_dump($data);

        $query->bindValue(':title', $data['title']);
        $query->bindValue(':photo', $data['photo']);
        $query->bindValue(':description', $data['description']);
        $query->bindValue(':category', $data['category']);
        $query->bindValue(':post_id', $data['id']);

        return $query->execute();
    }
}
