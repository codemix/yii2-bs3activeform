<?php
namespace Codemix\BS3\demo\controllers;

class DefaultController extends \yii\web\Controller
{
    public $defaultAction = 'pages';

    public function actions()
    {
        return [
            'pages' => 'yii\web\ViewAction',
        ];
    }
}

