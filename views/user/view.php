<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = $model->username;
$this->params['breadcrumbs'][] = ['label' => 'Usuarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="user-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿Estas seguro que quieres eliminar este usuario?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'attribute' => 'username',
                'label' => 'Usuario',
            ],
            'email:email',
            [
                'attribute' => 'person.nombre',
                'label' => 'Nombre',
            ], 
            [
                'attribute' => 'person.apellido',
                'label' => 'Apellido',
            ],
            [
                'attribute' => 'person.cedula',
                'label' => 'Cedula',
            ],
            [
                'attribute' => 'person.recomendado',
                'value' => function($model){
                            if (empty($model->person->recomendado)) {
                                return Yii::t('app', 'No especificado.');
                                }else{
                                return $model->person->recomendado;
                            }
                        },
                'label' => 'Recomendado',
            ], 
            [
                'attribute' => 'person.barrio',
                'value' => function($model){
                            if (empty($model->person->barrio)) {
                                return Yii::t('app', 'No especificado.');
                                }else{
                                return $model->person->barrio;
                            }
                        },
                'label' => 'Barrio',
            ], 
            [
                'attribute' => 'person.direccion',
                'value' => function($model){
                            if (empty($model->person->direccion)) {
                                return Yii::t('app', 'No especificado.');
                                }else{
                                return $model->person->direccion;
                            }
                        },
                'label' => 'Direccion',
            ],
        ],
    ]) ?>

</div>
