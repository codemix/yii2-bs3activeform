<?php
namespace codemix\bs3\demo\models;

class Demo extends \yii\base\Model
{
    public $demo;

    public function rules()
    {
        return array(
            array('demo', 'required'),
        );
    }

    public function attributeLabels()
    {
        return array(
            'demo' => 'Demolabel',
        );
    }
}
