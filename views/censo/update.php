<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Censo */

$this->title = 'Actualizar Persona: ' . $model->person->nombre . " " . $model->person->apellido;
$this->params['breadcrumbs'][] = ['label' => 'Listado', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="censo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'person' => $person
    ]) ?>

</div>
