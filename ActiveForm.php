<?php
namespace codemix\bs3;

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\base\InvalidConfigException;
use Yii;

/**
 * A Bootstrap 3 enhanced version of ActiveForm.
 */
class ActiveForm extends \yii\widgets\ActiveForm
{
    /**
     * @var array HTML attributes for the form tag. Default is role 'form'.
     */
    public $options = ['role' => 'form'];

    /**
     * @var string the form layout. Either 'standard' (default), 'horizontal' or 'inline'.
     */
    public $layout = 'standard';

    /**
     * @inheritDoc
     */
    public function init()
    {
        if(!in_array($this->layout, ['standard','horizontal','inline'])) {
            throw new InvalidConfigException('Invalid layout type: '.$this->layout);
        }

        if($this->layout!=='standard') {
            Html::addCssClass($this->options, 'form-'.$this->layout);
        }
        if (!isset($this->fieldConfig['class'])) {
            $this->fieldConfig['class'] = ActiveField::className();
        }
        return parent::init();
    }
}
