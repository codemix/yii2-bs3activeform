<?php
namespace Codemix\BS3\demo;

class Module extends \yii\base\Module
{
    public $layout = '2column';

    public function init()
    {
        \Yii::setAlias('@codemixbs3demo',__DIR__);
        parent::init();
    }

}
