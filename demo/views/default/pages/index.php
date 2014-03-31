<?php
use Codemix\BS3\ActiveForm;
use Codemix\BS3\demo\models\Demo;
use yii\widgets\Menu;
use yii\helpers\Markdown;

$items = array_combine(range(1,3), range(1,3));
$model = new Demo;
?>

<?php $this->beginBlock('sideBar'); ?>
    <?= Menu::widget([
        'options' => [
            'class'=>'nav',
        ],
        'items' => [
            [
                'label'=>'Introduction',
                'url'=>'#introduction',
            ],
            [
                'label'=>'Group Options',
                'url'=>'#group-options',
            ],
            [
                'label'=>'Form Options',
                'url'=>'#form-options',
            ],
        ],
    ]); ?>
    <a href="#top" class="back-to-top">Back to top</a>
<?php $this->endBlock(); ?>

<h1>Codemix\BS3\ActiveForm</h1>

<p class="lead">A Bootstrap 3 enhanced ActiveForm for Yii 2</p>

<h2 id="introduction">Introduction</h2>

<p>
    <tt>Codemix\BS3\ActiveForm</tt> is an enhanced version of <tt>yii\widgets\ActiveForm</tt>.
    It mainly sets the appropriate <tt>ActiveField</tt> configuration for different Bootstrap form layouts,
    and adds some useful features to <tt>ActiveField</tt>. This gives you a wide range of rendering
    options for your Bootstrap 3 forms. Make sure you check out the example pages linked on top.
</p>

<div class="panel panel-default">
    <div class="panel-heading">Example 1: Rendering features</div>
    <div class="panel-body row">
        <div class="col-md-5">
           <?php $form = ActiveForm::begin(['layout' => 'horizontal']) ?>
                <?= $form->field($model, 'demo', [
                    'inputOptions' => [
                        'placeholder' => $model->getAttributeLabel('demo'),
                    ],
                ])->label(false); ?>
                <?= $form->field($model, 'demo')->dropDownList($items); ?>
                <?= $form->field($model, 'demo')->checkbox(); ?>
                <?= $form->field($model, 'demo')->inline()->radioList($items); ?>
            <?php ActiveForm::end(); ?>
        </div>
        <div class="col-md-7">
            <?= Markdown::process(<<<MD
```php
<?php
use codemix\BS3\ActiveForm;
?>
<?php \$form = ActiveForm::begin(['layout' => 'horizontal']) ?>
    <?= \$form->field(\$model, 'demo', [
        'inputOptions' => [
            'placeholder' => \$model->getAttributeLabel('demo'),
        ],
    ])->label(false); ?>
    <?= \$form->field(\$model, 'demo')->dropDownList(\$items); ?>
    <?= \$form->field(\$model, 'demo')->checkbox(); ?>
    <?= \$form->field(\$model, 'demo')->inline()->radioList(\$items); ?>
<?php ActiveForm::end(); ?>
```
MD
            , 'gfm'); ?>
        </div>
    </div>
</div>

<div class="alert alert-warning">
    <p>
        <b>Note:</b> This class does <i>not</i> include any Bootstrap 3 CSS or Javascript files.
        We recommend to use the <tt>yii2-bootstrap</tt> extension to include those files.
    </p>
</div>

<h2 id="field-options">Field Options</h2>

<p>
    We have extended <tt>yii\widgets\ActiveField</tt> to add some useful features for Bootstrap 3 forms.
</p>

<h3>New Template Placeholders</h3>

<p>
    There are a couple of new placeholders that you can use in the <code>template</code> option.
    Some of them are automatically configured, when you choose a form layout.
</p>

<table class="table table-bordered table-striped">
    <colgroup>
        <col class="col-xs-1">
        <col class="col-xs-7">
    </colgroup>
    <thead>
        <tr>
            <th>Placeholder</th>
            <th>Description</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><code>{beginLabel}</code></td>
            <td>
                The opening label tag (if you need more control over the label than with <code>{label}</code>).
            </td>
        </tr>
        <tr>
            <td><code>{labelTitle}</code></td>
            <td>
                The label title, for use with <code>{beginLabel}</code> / <code>{endLabel}.</code>
            </td>
        </tr>
        <tr>
            <td><code>{endLabel}</code></td>
            <td>
                The closing label tag.
            </td>
        </tr>
        <tr>
            <td><code>{beginWrapper}</code></td>
            <td>
                The opening wrapper tag. This is only used for some elements and layouts.
            </td>
        </tr>
        <tr>
            <td><code>{endWrapper}</code></td>
            <td>
                The closing wrapper tag. This is only used for some elements and layouts.
            </td>
        </tr>
    </tbody>
</table>

<h3>Options</h3>

<table class="table table-bordered table-striped">
    <colgroup>
        <col class="col-xs-1">
        <col class="col-xs-7">
    </colgroup>
    <thead>
        <tr>
            <th>Option</th>
            <th>Description</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><code>inline</code></td>
            <td>
                This option can be used with <tt>radioButtonList</tt> and <tt>checkBoxList</tt> elements
                to render inline list items. If set to <code>true</code>, it will automatically set the
                appropriate <code>template</code> and <code>inputOptions</code> (i.e. labelOptions).
                You can also call the <tt>inline()</tt> method instead.
            </td>
        <tr>
        <tr>
            <td><code>label</code></td>
            <td>
                This can be set to <code>false</code> to disable the field label. Default is <code>true</code>.
            </td>
        <tr>
        <tr>
            <td><code>inputTemplate</code></td>
            <td>
                An optional template for the input element. If set, this will be used to render the
                content of the <code>{input}</code> placeholder. This can be used to create input
                groups (see the examples). The default is none.
            </td>
        <tr>
        <tr>
            <td><code>wrapperOptions</code></td>
            <td>
                The <code>options</code> of the wrapper tag.
            </td>
        <tr>
        <tr>
            <td><code>horizontalCssClasses</code></td>
            <td>
                This is only used with horizontal layout. It defines the column grid classes to use
                for the label, the wrapper, the error and the hint. There's also an offset class
                that will be applied if there's no label (e.g. on checkboxes or if label was disabled).
                The default ist:
                <pre>
'offset' =&gt; 'col-sm-offset-3',
'label' =&gt; 'col-sm-3',
'wrapper' =&gt; 'col-sm-6',
'error' =&gt; '',
'hint' =&gt; 'col-sm-3',
                </pre>
            </td>
        <tr>
        <tr>
            <td><code>enableErrorBlock</code></td>
            <td>
                Whether to render the error block. This is mainly useful for <code>inline</code> forms.
                By default this is <code>true</code> for <code>standard</code> and <code>horizontal</code>
                layout and <code>false</code> for <code>inline</code> layout.
            </td>
        </tr>
    </tbody>
</table>

<h3>Methods</h3>

<table class="table table-bordered table-striped">
    <colgroup>
        <col class="col-xs-1">
        <col class="col-xs-7">
    </colgroup>
    <thead>
        <tr>
            <th>Method</th>
            <th>Description</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><code>inline($value = true)</code></td>
            <td>
                Set the <code>inline</code> option of the field. This only affects <tt>radioButtonList</tt>s and
                <tt>checkBoxList</tt>s.
            </td>
        </tr>
        <tr>
            <td><code>label($label = null, $options = [])</code></td>
            <td>
                This overrides <tt>yii\widgets\ActiveField::label()</tt> and disables the label if
                <code>false</code> is passed as <code>$label</code> value.
            </td>
        </tr>
    </tbody>
</table>

<hr>

<h2 id="form-options">Form Options</h2>

<p>
    You can preconfigure all the above field options in the <code>fieldConfig</code> property of the form.
    In addition there's now a <code>layout</code> property to configure the main Bootstrap 3 form layout.
</p>

<table class="table table-bordered table-striped">
    <colgroup>
        <col class="col-xs-1">
        <col class="col-xs-7">
    </colgroup>
    <thead>
        <tr>
            <th>Option</th>
            <th>Description</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><code>layout</code></td>
            <td>
                The form layout to use. Options are <code>standard</code> (default), <code>horizontal</code>
                and <code>inline</code>. Depending on the layout different default field settings will be used.
            </td>
        </tr>
    </tbody>
</table>
