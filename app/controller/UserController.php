<?php

// require_once "./app/models/Post.php";
class UserController
{

    public function index()
    {
        include('public/views/login.php');
    }
    // create account 
    public function create()
    {
        session_start();
        if (isset($_POST['submiit'])) {
            $newUser = new Connection();
            $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $isCreated = $newUser->insert("users", array_remove(['submiit'], $_POST));
            if ($isCreated) {
                header("location: ../login");
            }
            
        }
    }

    public function login()
    {
        session_start();
        if (isset($_POST['submit'])) {

            $check = new Connection();
            $data = array('email' => $_POST['email']);
            $result = $check->selectOne("users", $data);
            // var_dump($result);

            if ($result->email === $_POST['email'] && password_verify($_POST['password'], $result->password)) {

                $_SESSION['logged'] = true;
                $_SESSION['email'] = $result->email;
                $_SESSION['user'] = $result->id;
                // session_id($result->id);
                header("location: ../home");
            } elseif (empty($_POST['email']) || empty($_POST['password'])) {
                header("location:../login");
                //send user back to the login page.
                $_SESSION['message'] = "the inputs are empty 💀";
                $_SESSION['msg_type'] = "danger";
            }else {
                header("location:../login");
                //send user back to the login page.
                $_SESSION['message'] = "Email or password is incorrect";
                $_SESSION['msg_type'] = "danger";
            }

        }
    }
    //logout and destroy user session
    public function logout()
    {
        session_start();
        var_dump($_POST);
        if (isset($_POST['logout'])) {
            // echo "im still here";
            session_destroy();
            header("location: ../login");
        }
    }

    public function addpost()
    {
        session_start();
        if (isset($_POST['ADD'])) {
            $addp = new Post();
            $isCreated = $addp->addpost("posts", array_remove(['ADD'], $_POST),$_SESSION['user']);
            if ($isCreated) {
                header("location: ../home");
            }
        }
    }


    public function selectPost()
    {
        $getPost= new Post();
        return $getPost->getPosts();
    }
}



function array_remove($selections, $arr)
{
    $result = $arr;
    foreach ($selections as $selection) {
        unset($result[$selection]);
    }
    return $result;
}
