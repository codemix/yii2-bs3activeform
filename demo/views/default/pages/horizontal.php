<?php
use Codemix\BS3\ActiveForm;
use Codemix\BS3\demo\models\Demo;
use yii\widgets\Menu;
use yii\helpers\Html;
use yii\helpers\Markdown;

$model = new Demo;
$items = array_combine(range(1,3), range(1,3));
?>

<?php $this->beginBlock('sideBar'); ?>
    <?= Menu::widget([
        'options' => [
            'class'=>'nav',
        ],
        'items' => [
            [
                'label'=>'Default Options',
                'url'=>'#default-options',
            ],
            [
                'label'=>'Hint',
                'url'=>'#hint',
            ],
            [
                'label'=>'Placeholder',
                'url'=>'#placeholder',
            ],
            [
                'label'=>'Disabled Label',
                'url'=>'#disabled-label',
            ],
            [
                'label'=>'Column Sizing',
                'url'=>'#column-sizing',
            ],
            [
                'label'=>'List Controls',
                'url'=>'#list-controls',
            ],
            [
                'label'=>'Inline Lists',
                'url'=>'#inline-lists',
            ],
            [
                'label'=>'Custom Inputs',
                'url'=>'#custom-inputs',
            ],
            [
                'label'=>'Custom Columns',
                'url'=>'#custom-columns',
            ],
        ],
    ]); ?>
    <a href="#top" class="back-to-top">Back to top</a>
<?php $this->endBlock(); ?>

<h1>Examples: Horizontal Layout</h1>

<p>
    If <code>layout</code> is set to <code>horizontal</code> a horizontal form is rendered.
</p>

<?= Markdown::process(<<<MD
```php
<?php \$form = ActiveForm::begin(['layout' => 'horizontal']) ?>
```
MD
, 'gfm'); ?>

<p>
    Here by default the <code>template</code> is set to
    <code>{label} {beginWrapper} {input} {error} {endWrapper} {help}</code>,
    which will use 3 columns, one for label (<code>col-sm-3</code>), input (<code>col-sm-6</code>)
    and help text (<code>col-sm-3</code>) each. Error messages get rendered below the input. The column
    arrangement can easily be changed, though (see <a href="#custom-columns">below</a>).
</p>
<p>
    Following is a list of the most common form elements to exemplify different options and validation states.
</p>

<?php $form = ActiveForm::begin([
    'layout' => 'horizontal',
]) ?>

    <hr>

    <h2 id="default-options">Default Options</h2>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'demo'); ?>
            <?= $form->field($model, 'demo')->checkbox(); ?>
            <p>Error state:</p>
            <?php $model->validate(); ?>
            <?= $form->field($model, 'demo'); ?>
            <?= $form->field($model, 'demo')->checkbox(); ?>
        </div>
        <div class="col-md-6">
            <?= Markdown::process(<<<MD
```php
<?php \$form = ActiveForm::begin() ?>
    <?= \$form->field(\$model, 'demo'); ?>
    <?= \$form->field(\$model, 'demo')->checkbox(); ?>
<?php ActiveForm::end(); ?>
```
MD
            , 'gfm'); ?>
        </div>
    </div>

    <hr>

    <h2 id="hint">Hint</h2>
    <div class="row">
        <div class="col-md-6">
            <?php $model = new Demo ?>
            <?= $form->field($model, 'demo')->hint('Hint text'); ?>
            <?= $form->field($model, 'demo')->hint('Hint text')->checkbox(); ?>
            <p>Error state:</p>
            <?php $model->validate(); ?>
            <?= $form->field($model, 'demo')->hint('Hint text'); ?>
            <?= $form->field($model, 'demo')->hint('Hint text')->checkbox(); ?>
        </div>
        <div class="col-md-6">
            <?= Markdown::process(<<<MD
```php
<?php \$form = ActiveForm::begin() ?>
    <?= \$form->field(\$model, 'demo')->hint('Hint text'); ?>
<?php ActiveForm::end(); ?>
```
MD
            , 'gfm'); ?>
        </div>
    </div>

    <hr>

    <h2 id="placeholder">Placeholder</h2>
    <div class="row">
        <div class="col-md-6">
            <?php $model = new Demo ?>
            <?= $form->field($model, 'demo', [
                'inputOptions' => [
                    'placeholder' => 'Placeholder',
                ],
            ]); ?>
            <p>Error state:</p>
            <?php $model->validate(); ?>
            <?= $form->field($model, 'demo', [
                'inputOptions' => [
                    'placeholder' => 'Placeholder',
                ],
            ]); ?>
        </div>
        <div class="col-md-6">
            <?= Markdown::process(<<<MD
```php
<?php \$form = ActiveForm::begin() ?>
    <?= \$form->field(\$model, 'demo', [
        'inputOptions' => [
            'placeholder' => 'Placeholder',
        ],
    ]); ?>
<?php ActiveForm::end(); ?>
```
MD
            , 'gfm'); ?>
        </div>
    </div>

    <hr>

    <h2 id="disabled-label">Disabled Label</h2>
    <div class="row">
        <div class="col-md-6">
            <?php $model = new Demo ?>
            <?= $form->field($model, 'demo', [
                'inputOptions' => [
                    'placeholder' => $model->getAttributeLabel('demo')
                ],
            ])->label(false); ?>
            <p>Error state:</p>
            <?php $model->validate(); ?>
            <?= $form->field($model, 'demo', [
                'inputOptions' => [
                    'placeholder' => $model->getAttributeLabel('demo')
                ],
            ])->label(false); ?>
        </div>
        <div class="col-md-6">
            <?= Markdown::process(<<<MD
```php
<?php \$form = ActiveForm::begin() ?>
    <?= \$form->field(\$model, 'demo', [
        'inputOptions' => [
            'placeholder' => \$model->getAttributeLabel('demo')
        ],
    ])->label(false); ?>
<?php ActiveForm::end(); ?>
```
MD
            , 'gfm'); ?>
        </div>
    </div>

    <hr>

    <h2 id="column-sizing">Column Sizing</h2>
    <div class="row">
        <div class="col-md-6">
            <?php $model = new Demo ?>
            <?= $form->field($model, 'demo', [
                'horizontalCssClasses' => [
                    'wrapper' => 'col-sm-2',
                ]
            ])->hint('Hint Text') ?>
            <?= $form->field($model, 'demo', [
                'horizontalCssClasses' => [
                    'wrapper' => 'col-sm-4',
                ]
            ])->hint('Hint Text') ?>
            <p>Error state:</p>
            <?php $model->validate(); ?>
            <?= $form->field($model, 'demo', [
                'horizontalCssClasses' => [
                    'wrapper' => 'col-sm-4',
                ]
            ])->hint('Hint Text') ?>
        </div>
        <div class="col-md-6">
            <?= Markdown::process(<<<MD
```php
<?php \$form = ActiveForm::begin() ?>
    <?= \$form->field(\$model, 'demo', [
        'horizontalCssClasses' => [
            'wrapper' => 'col-sm-2',
        ]
    ])->hint('Hint Text') ?>
    <?= \$form->field(\$model, 'demo', [
        'horizontalCssClasses' => [
            'wrapper' => 'col-sm-4',
        ]
    ])->hint('Hint Text') ?>
<?php ActiveForm::end(); ?>
```
MD
            , 'gfm'); ?>
        </div>
    </div>

    <hr>

    <h2 id="list-controls">List Controls</h2>
    <div class="row">
        <div class="col-md-6">
            <?php $model = new Demo ?>
            <?= $form->field($model, 'demo')->dropDownList($items) ?>
            <?= $form->field($model, 'demo')->checkboxList($items) ?>
            <?= $form->field($model, 'demo')->label(false)->checkboxList($items) ?>
            <?= $form->field($model, 'demo')->hint('Hint Text')->radioList($items) ?>
        </div>

        <div class="col-md-6">
            <?= Markdown::process(<<<MD
```php
<?php \$form = ActiveForm::begin() ?>
    <?= \$form->field(\$model, 'demo')->dropDownList(\$items) ?>
    <?= \$form->field(\$model, 'demo')->checkboxList(\$items) ?>
    <?= \$form->field(\$model, 'demo')->label(false)->checkboxList(\$items) ?>
    <?= \$form->field(\$model, 'demo')->hint('Hint Text')->radioList(\$items) ?>
<?php ActiveForm::end(); ?>
```
MD
            , 'gfm'); ?>
        </div>
    </div>

    <hr>

    <h2 id="inline-lists">Inline Lists</h2>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'demo')->inline()->checkboxList($items) ?>
            <?= $form->field($model, 'demo')->hint('Hint Text')->inline()->radioList($items) ?>
            <?php $model->validate(); ?>
            <?= $form->field($model, 'demo')->inline()->checkboxList($items) ?>
            <?= $form->field($model, 'demo')->hint('Hint Text')->inline()->radioList($items) ?>
        </div>

        <div class="col-md-6">
            <?= Markdown::process(<<<MD
```php
<?php \$form = ActiveForm::begin() ?>
    <?= \$form->field(\$model, 'demo')->inline()->checkboxList(\$items) ?>
    <?= \$form->field(\$model, 'demo')->hint('Hint Text')->inline()->radioList(\$items) ?>
<?php ActiveForm::end(); ?>
```
MD
            , 'gfm'); ?>
        </div>
    </div>

    <hr>

    <h2 id="custom-inputs">Custom Inputs</h2>
    <div class="row">
        <div class="col-md-6">
            <?php $model = new Demo ?>
            <?= $form->field($model, 'demo', [
                'inputTemplate' => '<div class="input-group"><span class="input-group-addon">@</span>{input}</div>',
            ]); ?>
            <?= $form->field($model, 'demo', [
                'inputTemplate' => '<div class="input-group"><span class="input-group-addon">@</span>{input}'.
                    '<span class="input-group-addon">.00</span></div>',
            ]); ?>
            <?= $form->field($model, 'demo', [
                'inputTemplate' => '<div class="input-group"><span class="input-group-addon">'.
                    Html::checkbox('test').'</span>{input}</div>',
            ]); ?>
            <?= $form->field($model, 'demo', [
                'inputTemplate' => '<div class="input-group"><span class="input-group-btn">'.
                    '<button class="btn btn-default">Go!</button></span>{input}</div>',
            ]); ?>
            <?php $menu = Menu::widget([
                'options' => [
                    'class'=>'dropdown-menu',
                ],
                'items' => [
                    ['label' => 'Action', 'url' => '#'],
                    ['label' => 'Another Action', 'url' => '#'],
                    ['options' => ['class'=>'divider']],
                    ['label' => 'Separated Link', 'url' => '#'],
                ],
            ]); ?>
            <?= $form->field($model, 'demo', [
                'inputTemplate' => '<div class="input-group"><div class="input-group-btn">'.
                    '<button class="btn btn-default dropdown-toggle" data-toggle="dropdown">Action '.
                    '<span class="caret"></span></button>'.$menu.'</div>{input}</div>',
            ]); ?>
            <?= $form->field($model, 'demo', [
                'inputTemplate' => '<div class="input-group"><div class="input-group-btn">'.
                    '<button class="btn btn-default">Action</button>'.
                    '<button class="btn btn-default dropdown-toggle" data-toggle="dropdown">'.
                    '<span class="caret"></span></button>'.$menu.'</div>{input}</div>',
            ]); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <?= Markdown::process(<<<MD
```php
<?php \$form = ActiveForm::begin() ?>
    <?= \$form->field(\$model, 'demo', [
        'inputTemplate' => '<div class="input-group"><span class="input-group-addon">@</span>{input}</div>',
    ]); ?>
    <?= \$form->field(\$model, 'demo', [
        'inputTemplate' => '<div class="input-group"><span class="input-group-addon">@</span>{input}'.
            '<span class="input-group-addon">.00</span></div>',
    ]); ?>
    <?= \$form->field(\$model, 'demo', [
        'inputTemplate' => '<div class="input-group"><span class="input-group-addon">'.
            Html::checkbox('test').'</span>{input}</div>',
    ]); ?>
    <?= \$form->field(\$model, 'demo', [
        'inputTemplate' => '<div class="input-group"><span class="input-group-btn">'.
            '<button class="btn btn-default">Go!</button></span>{input}</div>',
    ]); ?>
    <?php \$menu = Menu::widget([
        'options' => [
            'class'=>'dropdown-menu',
        ],
        'items' => [
            ['label' => 'Action', 'url' => '#'],
            ['label' => 'Another Action', 'url' => '#'],
            ['options' => ['class'=>'divider']],
            ['label' => 'Separated Link', 'url' => '#'],
        ],
    ]); ?>
    <?= \$form->field(\$model, 'demo', [
        'inputTemplate' => '<div class="input-group"><div class="input-group-btn">'.
            '<button class="btn btn-default dropdown-toggle" data-toggle="dropdown">Action '.
            '<span class="caret"></span></button>'.\$menu.'</div>{input}</div>',
    ]); ?>
    <?= \$form->field(\$model, 'demo', [
        'inputTemplate' => '<div class="input-group"><div class="input-group-btn">'.
            '<button class="btn btn-default">Action</button>'.
            '<button class="btn btn-default dropdown-toggle" data-toggle="dropdown">'.
            '<span class="caret"></span></button>'.\$menu.'</div>{input}</div>',
    ]); ?>
<?php ActiveForm::end(); ?>
```
MD
            , 'gfm'); ?>
        </div>
    </div>

<?php ActiveForm::end(); ?>

<hr>

<h2 id="custom-columns">Custom Columns</h2>

<?= Markdown::process(<<<MD
```php
<?php \$form = ActiveForm::begin([
    'layout' => 'horizontal',
    'template' => "{label}\\n{beginWrapper}\\n{input}\\n{hint}\\n{error}\\n{endWrapper}",
    'fieldConfig' => [
        'horizontalCssClasses' => [
            'label' => 'col-sm-4',
            'offset' => 'col-sm-offset-4',
            'wrapper' => 'col-sm-8',
            'error' => '',
            'hint' => '',
        ],
    ],
]) ?>
<?php ActiveForm::end(); ?>
```
MD
, 'gfm'); ?>

<?php $form = ActiveForm::begin([
    'layout' => 'horizontal',
    'fieldConfig' => [
        'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
        'horizontalCssClasses' => [
            'label' => 'col-sm-4',
            'offset' => 'col-sm-offset-4',
            'wrapper' => 'col-sm-8',
            'error' => '',
            'hint' => '',
        ],
    ],
]) ?>
    <div class="row">
        <div class="col-md-6">
            <?php $model = new Demo ?>
            <?= $form->field($model, 'demo')->hint('Hint Text'); ?>
            <?= $form->field($model, 'demo')->dropDownList($items); ?>
            <?= $form->field($model, 'demo')->checkboxList($items); ?>
            <?= $form->field($model, 'demo')->checkbox(); ?>
            <p>Error state:</p>
            <?php $model->validate(); ?>
            <?= $form->field($model, 'demo')->hint('Hint Text'); ?>
            <?= $form->field($model, 'demo')->dropDownList($items); ?>
            <?= $form->field($model, 'demo')->checkboxList($items); ?>
            <?= $form->field($model, 'demo')->checkbox(); ?>
        </div>
        <div class="col-md-6">
            <?= Markdown::process(<<<MD
```php
<?php \$form = ActiveForm::begin() ?>
    <?= \$form->field(\$model, 'demo')->hint('Hint Text'); ?>
    <?= \$form->field(\$model, 'demo')->dropDownList(\$items); ?>
    <?= \$form->field(\$model, 'demo')->checkboxList(\$items); ?>
    <?= \$form->field(\$model, 'demo')->checkbox(); ?>
<?php ActiveForm::end(); ?>
```
MD
            , 'gfm'); ?>
        </div>
    </div>

<?php ActiveForm::end(); ?>
