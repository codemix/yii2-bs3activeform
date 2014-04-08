<?php $this->registerCss(<<<CSS
    .bs3-docs-sidebar {
        position: fixed;
        top: 95px;
    }
    .bs3-docs-sidebar .nav>li>a {
        display: block;
        font-size: 13px;
        font-weight: 500;
        color: #999;
        padding: 4px 20px;
    }
    .bs3-docs-sidebar .nav>.active>a,
    .bs3-docs-sidebar .nav>.active:hover>a,
    .bs3-docs-sidebar .nav>.active:focus>a {
        padding-left: 18px;
        font-weight: 700;
        color: #563d7c;
        background-color: transparent;
        border-left: 2px solid #563d7c;
    }
    .bs3-docs-sidebar .nav>li>a:hover,
    .bs3-docs-sidebar .nav>li>a:focus {
        padding-left: 19px;
        color: #563d7c;
        text-decoration: none;
        background-color: transparent;
        border-left: 1px solid #563d7c;
    }
    .bs3-docs-sidebar .nav>.active>a,
    .bs3-docs-sidebar .nav>.active:hover>a,
    .bs3-docs-sidebar .nav>.active:focus>a {
        padding-left: 18px;
        font-weight: 700;
        color: #563d7c;
        background-color: transparent;
        border-left: 2px solid #563d7c;
    }
    .back-to-top {
        margin-top: 10px;
        margin-left: 10px;
        padding: 4px 10px;
        font-size: 12px;
        font-weight: 500;
        color: #999;
    }
    .back-to-top:hover {
        text-decoration: none;
        color: #563d7c;
    }

CSS
); ?>
<?php $this->beginContent('@codemix/bs3/demo/views/layouts/main.php'); ?>
<div class="row">
    <div class="col-md-2">
        <div class="bs3-docs-sidebar">
            <?= $this->blocks['sideBar'] ?>
        </div>
    </div>
    <div class="col-md-10">
        <?= $content ?>
    </div>
</div>
<?php $this->endContent() ?>
