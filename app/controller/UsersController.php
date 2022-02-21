<?php 

class UsersController
{
  public function __construct()
  {
      // echo "user";
  }
  public function index(){
    echo "index";

  }
  public function create(){
    echo "create";

  }
  public function save(){
    echo "save";

  }
  public function edit(){
    echo "save";
    
  }
  public function update(){
    echo "save";
    
  }
  public function delete($id)
  {
    echo "delete user with id =$id";
  }
}