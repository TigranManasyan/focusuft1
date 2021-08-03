<?php


namespace app\controllers;


use app\models\Category;
use yii\web\Controller;

class FaqController extends Controller
{
    public function actionIndex(){
        $categories = Category::find()->all();

        return $this->render('faq-page',['categories' => $categories]);
    }

}
