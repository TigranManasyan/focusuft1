<?php


namespace controllers;


use engine\components\View;

class UserController extends Controller
{

    public function index(): View
    {
        return view('users/index.php', [
            'user'=>"John Smith",
            'email'=>"asd@mail.ru"
        ]);
    }
}