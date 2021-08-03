<?php

namespace app\helpers;

use Yii;

class Modal
{
    /**
     * @param $title
     */
    public static function setTitle($title)
    {
        Yii::$app->session->setFlash('modal.title', $title);
    }

    /**
     * @param $body
     */
    public static function setBody($body)
    {
        Yii::$app->session->setFlash('modal.body', $body);
    }

    /**
     * @return mixed
     */
    public static function getTitle()
    {
        return Yii::$app->session->getFlash('modal.title');
    }

    /**
     * @return mixed
     */
    public static function getBody()
    {
        return Yii::$app->session->getFlash('modal.body');
    }

    /**
     * @param string $title
     * @param string $body
     */
    public static function setRaw($title = '', $body = '')
    {
        self::setTitle($title);
        self::setBody($body);
    }
}
