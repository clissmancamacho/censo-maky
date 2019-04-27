<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Censo */

$this->title = 'Agregar Persona';
$this->params['breadcrumbs'][] = ['label' => 'Listado', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="censo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'person' => $person
    ]) ?>

</div>
