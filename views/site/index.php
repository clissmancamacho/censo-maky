<?php
use yii\helpers\Html;

/* @var $this yii\web\View */

$this->title = 'Inicio';
// var_dump(Yii::$app->user->identity->admin);die;
?>
<div class="site-index">

    <div class="jumbotron">
        <?php if(Yii::$app->user->isGuest) : ?>
            <h1>¡Bienvenido!</h1>
            <p class="lead">Inicia sesión para comenzar.</p>
            <?= Html::a('Iniciar Sesión', ['login'], ['class' => 'btn btn-lg btn-success']) ?>    
        <?php else : ?>
            <h1>¡Hola, <?= Yii::$app->user->identity->username ?>!</h1>
            <p class="lead">Echale un vistazo a la lista de censados.</p>
            <?= Html::a('Ir al listado', ['censo/index'], ['class' => 'btn btn-lg btn-success']) ?>    
        <?php endif; ?>
         <?php if(!Yii::$app->user->isGuest && Yii::$app->user->identity->admin) : ?>
            <h2>Administra los usuarios del sistema</h2>
            <p class="lead">Visualiza, crea y edita usuarios:</p>
            <?= Html::a('Ir al listado de usuarios', ['user/index'], ['class' => 'btn btn-lg btn-success']) ?>
        <?php endif; ?>
    </div>

    <!-- <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>Información de Interés</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>
            </div>
            <div class="col-lg-4">
                <h2>Información de Interés</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>
            </div>
            <div class="col-lg-4">
                <h2>Información de Interés</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>
            </div>
        </div>

    </div> -->
</div>
