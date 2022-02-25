<?php
// require_once "./app/models/Post.php";

// use LDAP\Result;

class UserController
{

    public function index()
    {
        include('public/views/login.php');
    }
//===================================================== sign up / sign in  ================================================
public function create()
    {
        if (isset($_POST['submiit'])) {
            $newUser = new Connection();
            $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $isCreated = $newUser->insert("users", array_remove(['submiit'], $_POST));
            if ($isCreated) {
                header("location: /master/login");
            }
        }
    }

    public function login()
    {
        // session_start();
        if (isset($_POST['submit'])) {
            $check = new Connection();
            $data = array('email' => $_POST['email']);
            $result = $check->selectOne("users", $data);
            // var_dump($result);
            // die(print_r($result));
            // print_r(["password" => $_POST['password'], "email" => $_POST['email']]);
            if ($result->email === $_POST['email'] && password_verify($_POST['password'], $result->password)) {
                // die("fff");
                $_SESSION['logged'] = true;
                $_SESSION['email'] = $result->email;
                $_SESSION['user'] = $result->id;
                $_SESSION['username'] = $result->first_name;
                // session_id($result->id);
                header("location: /master/home");
            } elseif (empty($_POST['email']) || empty($_POST['password'])) {
                print_r(["password" => $_POST['password'], "email" => $_POST['email']]);
                header("location: /master/login");
                //send user back to the login page.
                $_SESSION['message'] = "the inputs are empty 💀";
                $_SESSION['msg_type'] = "danger";
            } else {
                // die("nn");
                print_r(["password" => $_POST['password'], "email" => $_POST['email']]);
                header("location: /master/login");
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
        // var_dump($_POST);
        if (isset($_POST['logout'])) {
            // echo "im still here";
            session_destroy();
            header("location: ../login");
        }
    }

//===================================================== Post ================================================
    public function addpost()
    {
        if (isset($_POST['ADD'])) {
            $addp = new Post();
            // $data = array('user_id' => $_SESSION['user']);
            // $result = $addp->getPosts("posts", $data);
            // $_SESSION['post_id'] = $result->id;
            $isCreated = $addp->addpost("posts", array_remove(['ADD'], $_POST), $_SESSION['user']);
            if ($isCreated) {
                header("location: ../home");
            }
        }
    }

    public function selectPost()
    {
        $getPost = new Post();
        $getPosts= $getPost->getPosts();
        return $getPosts ;
    }

    public function Delpost()
    {
        if (isset($_POST['deleteP'])) {
            // die("eeeeeeeeeeeeeee");
            $delp = new Post();
            $isCreated = $delp->deletePost("posts", ["post_id" => $_POST['id']]);
            if ($isCreated) {
                header("location: ../home");
            }
        }
    }


    public function editPost(){
        if (isset($_POST['editP'])) {
            $edip = new Post();
            $result = $edip->editPost("posts",[...array_remove(["editP"], $_POST), "post_id" => $_POST['id']]);
            // var_dump($_POST);
            if ($result) {
                // die("qsdfgh");
                header("location: ../home");
            }
        }
    }

//===================================================== comments ================================================
    public function addComment()
    {
        if (isset($_POST['PostComment'])) {
            $addp = new Comments();
            var_dump($_POST);
            $isCreated = $addp->addComments("comments", $_POST['content'], $_SESSION['user'], $_POST['post_id']);
            echo $_POST['content'];
            var_dump($isCreated);
            if ($isCreated) {
                header("location: ../home");
            }
        }
    }
    public function selectComent()
    {
        $getPost = new Comments();
        $getPosts= $getPost->getComments();
        return $getPosts ;
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
