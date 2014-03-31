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
        ],
    ]); ?>
    <a href="#top" class="back-to-top">Back to top</a>
<?php $this->endBlock(); ?>

<h1>Examples: Inline Layout</h1>

<p>
    If <code>layout</code> is set to <code>inline</code> an inline form is rendered.
</p>

<?= Markdown::process(<<<MD
```php
<?php \$form = ActiveForm::begin(['layout' => 'inline']) ?>
```
MD
, 'gfm'); ?>

<p>
    Following is a list of the most common form elements to exemplify different options and validation states.
</p>

<div class="alert alert-warning">
    <p>
        <b>Note:</b> While the class does support error messages and hints in this mode,
        Bootstrap 3 does not really display them nicely. That's why error messages are disabled
        by default in this mode. You can enable them at your own risk through
        <code>enableErrorBlock</code> in the <code>fieldConfig</code> on the form. Also note that input
        groups are not really supported well by Bootstrap 3, as they span the full width.
    <p>
</div>

<?php $form = ActiveForm::begin([
    'layout' => 'inline',
]) ?>

    <hr>

    <h2 id="default-options">Default Options</h2>
    <div class="row">
        <div class="col-md-12">
            <p>
                <?php $model = new Demo ?>
                <?= $form->field($model, 'demo'); ?>
                <?= $form->field($model, 'demo')->checkbox(); ?>
                <?= $form->field($model, 'demo')->dropDownList($items); ?>
                <?= $form->field($model, 'demo')->checkboxList($items); ?>
            </p>
            <?= Markdown::process(<<<MD
```php
<?php \$form = ActiveForm::begin() ?>
    <?= \$form->field(\$model, 'demo'); ?>
    <?= \$form->field(\$model, 'demo')->checkbox(); ?>
    <?= \$form->field(\$model, 'demo')->dropDownList(\$items); ?>
    <?= \$form->field(\$model, 'demo')->checkboxList(\$items); ?>
<?php ActiveForm::end(); ?>
```
MD
            , 'gfm'); ?>
        </div>
    </div>

    <hr>

    <h2 id="hint">Hint</h2>
    <div class="row">
        <div class="col-md-12">
            <p>
                <?= $form->field($model, 'demo')->hint('Hint text'); ?>
                <?= $form->field($model, 'demo')->hint('Hint text')->checkbox(); ?>
                <?= $form->field($model, 'demo')->hint('Hint text')->dropDownList($items); ?>
            </p>
            <?= Markdown::process(<<<MD
```php
<?php \$form = ActiveForm::begin() ?>
    <?= \$form->field(\$model, 'demo')->hint('Hint text'); ?>
    <?= \$form->field(\$model, 'demo')->hint('Hint text')->checkbox(); ?>
    <?= \$form->field(\$model, 'demo')->hint('Hint text')->dropDownList(\$items); ?>
<?php ActiveForm::end(); ?>
```
MD
            , 'gfm'); ?>
        </div>
    </div>

<?php ActiveForm::end(); ?>
