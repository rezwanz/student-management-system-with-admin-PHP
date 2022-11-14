<?php


namespace App\classes;


class Auth
{
    public $users = [];
    public $email;
    public $password;

    public function __construct($post = NULL)
    {
        $this->email = $post['email'];
        $this->password = $post['password'];
    }

    public function index()
    {
        header('Location: action.php?page=login');
    }

    public function logout()
    {
        session_destroy();
        header('Location: action.php?page=login');
    }

}