<?php

// use LDAP\Connection;
require_once "Connection.php";
class Comments
{
    protected $db;
    function __construct()
    {
        $this->db = (new Connection())->db;
        // $db->connect();
    }
    public function getComments()
    {
        $stmt = $this->db->prepare('SELECT 
                            comments.id as comment_id,
                            users.id as user_id,
                            users.first_name as user,
                            posts.id as post_id,
                            comments.content as content
                            FROM comments
                            JOIN users
                            JOIN posts
                            on comments.user_id = users.id
                            and comments.post_id= posts.id
                            ORDER BY comments.id DESC');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function addComments($table, $content, $user_id, $post_id)
    {
        $query = $this->db->prepare("INSERT INTO $table (post_id, user_id , content) values (?,?,?)");
        // $query->bindValue('content', $data['content']);
        //execute 
        var_dump($query);
        return $query->execute([$post_id , $user_id , $content]);
    }
    // public function deleteComments($table, $data, $post_id)
    // {    
    //     // var_dump($data);
    //     // var_dump($post_id);
    //     $query = $this->db->prepare("DELETE FROM $table WHERE `post_id`=$post_id");
    //     return $query->execute($data);
    // }


}
