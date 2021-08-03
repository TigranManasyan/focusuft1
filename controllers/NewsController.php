<?php


namespace controllers;


use engine\Application;
use engine\components\View;
use models\Article;
use models\User;

class NewsController extends Controller
{
    public function index(): View
    {
        $article = new Article;
//        $articles = $article->all();
//        var_dump($articles);die;
        echo $article->all();

        return view('news/index.php', [
            'news' => 'my first news',
            'content' => 'lorem ipsum',
            'layout' => 1
        ]);
    }
}