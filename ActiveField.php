<?php
namespace Codemix\BS3;

use yii\helpers\Html;
use yii\helpers\ArrayHelper;

/**
 * BS3ActiveForm
 *
 * A Bootstrap 3 enhanced version of ActiveField.
 */
class ActiveField extends \yii\widgets\ActiveField
{
    /**
     * @var bool whether to render checkboxList and radioList inline. Default is false.
     */
    public $inline = false;

    /**
     * @var string|null optional template to renter the {input} placheolder content
     */
    public $inputTemplate;

    /**
     * @var array options for the wrapper tag
     */
    public $wrapperOptions = [];

    /**
     * @var null|array CSS grid classes for horizontal layout. This should be an array with these keys:
     *
     *  * 'offset' the offset grid class to append to the wrapper if no label is rendered
     *  * 'label' the label grid class
     *  * 'wrapper' the wrapper grid class
     *  * 'error' the error grid class
     *  * 'hint' the hint grid class
     */
    public $horizontalCssClasses;

    /**
     * @var bool whether to render the error block. Default is true.
     */
    public $enableErrorBlock = true;

    /**
     * @var bool whether to render the label. Default is true.
     */
    public $label = true;

    /**
     * @inheritDoc
     */
    public function __construct($config = [])
    {
        $layoutConfig = $this->createLayoutConfig($config);
        $config = ArrayHelper::merge($layoutConfig, $config);
        return parent::__construct($config);
    }

    /**
     * @inheritDoc
     */
    public function render($content = null)
    {
        if ($content === null) {
            if (!isset($this->parts['{beginWrapper'])) {
                $options = $this->wrapperOptions;
                $tag = ArrayHelper::remove($options, 'tag', 'div');
                $this->parts['{beginWrapper}'] = Html::beginTag($tag, $options);
                $this->parts['{endWrapper}'] = Html::endTag($tag);
            }
            if($this->label===false) {
                $this->parts['{label}'] = '';
                $this->parts['{beginLabel}'] = '';
                $this->parts['{labelTitle}'] = '';
                $this->parts['{endLabel}'] = '';
            } elseif (!isset($this->parts['{beginLabel'])) {
                $this->parts['{beginLabel}'] = Html::beginTag('label', $this->labelOptions);
                $this->parts['{endLabel}'] = Html::endTag('label');
                $attribute = Html::getAttributeName($this->attribute);
                $this->parts['{labelTitle}'] = Html::encode($this->label ? $this->label : $this->model->getAttributeLabel($attribute));
            }
            if($this->inputTemplate) {
                $input = isset($this->parts['{input}']) ?
                    $this->parts['{input}'] : Html::activeTextInput($this->model, $this->attribute, $this->inputOptions);
                $this->parts['{input}'] = strtr($this->inputTemplate, ['{input}' => $input]);
            }
        }
        return parent::render($content);
    }

    /**
     * @inheritDoc
     */
    public function checkbox($options = [], $enclosedByLabel = true)
    {
        if($enclosedByLabel) {
            if(!isset($options['template'])) {
                if($this->form->layout==='horizontal') {
                    $this->template = "{beginWrapper}\n<div class=\"checkbox\">\n{beginLabel}\n{input}\n{labelTitle}\n{endLabel}\n</div>\n{error}\n{endWrapper}\n{hint}";
                    Html::addCssClass($this->wrapperOptions, $this->horizontalCssClasses['offset']);
                } else {
                    $this->template = "<div class=\"checkbox\">\n{beginLabel}\n{input}\n{labelTitle}\n{endLabel}\n{error}\n{hint}\n</div>";
                }
            }
            $this->labelOptions['class'] = null;
        }

        parent::checkbox($options, false);
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function checkboxList($items, $options = [])
    {
        if($this->inline) {
            if(!isset($options['template'])) {
                $this->template = "{label}\n{beginWrapper}\n{input}\n{error}\n{endWrapper}\n{hint}";
            }
            if(!isset($options['itemOptions'])) {
                $options['itemOptions'] = [
                    'container' => false,
                    'labelOptions' => ['class' => 'checkbox-inline'],
                ];
            }
        }
        parent::checkboxList($items, $options);
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function radioList($items, $options = [])
    {
        if($this->inline) {
            if(!isset($options['template'])) {
                $this->template = "{label}\n{beginWrapper}\n{input}\n{error}\n{endWrapper}\n{hint}";
            }
            if(!isset($options['itemOptions'])) {
                $options['itemOptions'] = [
                    'container' => false,
                    'labelOptions' => ['class' => 'radio-inline'],
                ];
            }
        }
        parent::radioList($items, $options);
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function label($label = null, $options = [])
    {
        if(is_bool($label)) {
            $this->label = $label;
            if($label===false && $this->form->layout==='horizontal') {
                Html::addCssClass($this->wrapperOptions, $this->horizontalCssClasses['offset']);
            }
        } else {
            parent::label($label, $options);
        }
        return $this;
    }

    /**
     * @param bool $value whether to render a inline list
     * @return static the field object itself
     */
    public function inline($value = true)
    {
        $this->inline = (bool)$value;
        return $this;
    }

    /**
     * @param array $instanceConfig the configuration passed to this instance's constructor
     * @return array the layout specific default configuration for this instance
     */
    protected function createLayoutConfig($instanceConfig)
    {
        $config = [
            'hintOptions' => [
                'tag' => 'p',
                'class' => 'help-block',
            ],
            'errorOptions' => [
                'tag' => 'p',
                'class' => 'help-block',
            ],
            'inputOptions' => [
                'class' => 'form-control',
            ],
        ];

        $layout = $instanceConfig['form']->layout;

        if($layout==='horizontal') {
            $config['template'] = "{label}\n{beginWrapper}\n{input}\n{error}\n{endWrapper}\n{hint}";
            $cssClasses = [
                'offset' => 'col-sm-offset-3',
                'label' => 'col-sm-3',
                'wrapper' => 'col-sm-6',
                'error' => '',
                'hint' => 'col-sm-3',
            ];
            if(isset($instanceConfig['horizontalCssClasses'])) {
                $cssClasses = ArrayHelper::merge($cssClasses, $instanceConfig['horizontalCssClasses']);
            }
            $config['horizontalCssClasses'] = $cssClasses;
            $config['wrapperOptions'] = ['class' => $cssClasses['wrapper']];
            $config['labelOptions'] = ['class' => 'control-label '.$cssClasses['label']];
            $config['errorOptions'] = ['class' => 'help-block '.$cssClasses['error']];
            $config['hintOptions'] = ['class' => 'help-block '.$cssClasses['hint'] ];
        } elseif($layout==='inline') {
            $config['labelOptions'] = ['class' => 'sr-only'];
            $config['enableErrorBlock'] = false;
        }

        return $config;
    }
}
