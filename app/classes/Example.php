<?php


namespace App\classes;


class Example
{
    public function index()
    {
        header('Location: action.php?page=home');
    }
}