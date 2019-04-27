<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<script src="<?= Yii::getAlias('@web/js/ajax-modal.js')?> "></script>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'Censo',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
     
    $menuItems = [
        ['label' => 'Inicio', 'url' => ['/site/index']],
    ];
     
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Iniciar Sesión', 'url' => ['/site/login']];
    } else {
        if(Yii::$app->user->identity->admin){
            $menuItems[] = ['label' => 'Usuarios', 'url' => ['/user/index']];  
        }
        $menuItems[] = ['label' => 'Listado', 'url' => ['/censo/index']];  
        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Cerrar Sesión (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>';
    }
     
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
     
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; Censo <?= date('Y') ?></p>
    </div>
</footer>

<!-- Modal para los delete -->
<?php yii\bootstrap\Modal::begin([
    'headerOptions' => ['id' => 'modalHeader', "class" => "red"],
    'id' => 'modal',
    'size' => 'modal-sm',

]);

echo '<div id="modalContent"><div style="text-align:center"><i class="fa fa-spinner fa-spin" style="font-size:24px"></i></div></div>';

yii\bootstrap\Modal::end(); ?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
