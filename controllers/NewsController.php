<?php


namespace controllers;


use engine\components\View;

class NewsController extends Controller
{
    public function index(): View
    {
        return view('news/index.php', [
            'news' => 'my first news',
            'content' => 'lorem ipsum',
            'layout' => 1
        ]);
    }
}