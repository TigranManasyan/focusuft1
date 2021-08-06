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
        $user = new User; 

//        $user->update([]);
//        $articles = $article->all()->transform(function ($item) {
//            $item['is_read'] = (bool) rand(0, 1);
//            return $item;
//        });
//
//        foreach ($articles as $article) {
//            echo '<pre>';
//            print_r($article);
//            echo '</pre>';die;
//        }
        
//        echo '<pre>';
//        print_r($article->all('attributes'));
//        echo '</pre>';die;
//          $article->insert(["aaaa", "asas"]); die;
//          $user->insert(["John", "Smith", 30]); die;
//          $user->update([
//              'first_name' => 'Karen', 'last_name' => 'Doe'
//          ],1); die;


            /*$article->insert([
                'title' => "Title 7",
                'content' => "lorem ipsum dolor"
            ]);*/




        return view('news/index.php', [
            'news' => 'my first news',
            'content' => 'lorem ipsum',
            'layout' => 1
        ]);
    }
}