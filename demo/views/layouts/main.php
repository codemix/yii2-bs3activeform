<?php
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\Menu;

$this->registerJsFile('//code.jquery.com/jquery-1.8.3.min.js', [], ['position'=>View::POS_END]);
$this->registerJsFile('//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js',[], ['position'=>View::POS_END]);
$this->beginPage();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="language" content="en" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">
    <title><?= Html::encode($this->title); ?></title>
    <?php $this->head() ?>
</head>

<body data-spy="scroll" data-target=".bs3-docs-sidebar">

    <?php $this->beginBody() ?>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <?= Html::a('Codemix\BS3\ActiveForm', 'https://github.com/codemix/yii2-bs3activeform', [
                    'class'=>'navbar-brand',
                ]) ?>
            </div>
            <div class="collapse navbar-collapse">
                <?= Menu::widget([
                    'options' => [
                        'class'=>'nav navbar-nav',
                    ],
                    'items' => [
                        [
                            'label'=>'Overview',
                            'url'=>['default/pages', 'view'=>'index'],
                        ],
                        [
                            'label'=>'Standard Layout',
                            'url'=>['default/pages', 'view'=>'standard'],
                        ],
                        [
                            'label'=>'Horizontal Layout',
                            'url'=>['default/pages', 'view'=>'horizontal'],
                        ],
                        [
                            'label'=>'Inline Layout',
                            'url'=>['default/pages', 'view'=>'inline'],
                        ],
                    ],
                ]); ?>
            </div>
        </div>
    </nav>

    <div class="container">
        <?= $content; ?>
    </div>

    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
