<?php
namespace codemix\bs3\demo;

class Module extends \yii\base\Module
{
    public $layout = '2column';

    public function init()
    {
        \Yii::setAlias('@codemix/bs3/demo',__DIR__);
        parent::init();
    }

}
