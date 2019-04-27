<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Censo */

$this->title = $model->person->nombre . " " . $model->person->apellido;
$this->params['breadcrumbs'][] = ['label' => 'Listado', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="censo-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Estas seguro que quieres borrar a esta persona?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
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
                'attribute' => 'person.telefono',
                'value' => function($model){
                            if (empty($model->person->telefono)) {
                                return Yii::t('app', 'No especificado.');
                                }else{
                                return $model->person->telefono;
                            }
                        },
                'label' => 'Teléfono',
            ], 
            [
                'attribute' => 'person.zona',
                'value' => function($model){
                            if (empty($model->person->zona)) {
                                return Yii::t('app', 'No especificado.');
                                }else{
                                return $model->person->zona;
                            }
                        },
                'label' => 'Zona',
            ], 
            [
                'attribute' => 'person.puesto',
                'value' => function($model){
                            if (empty($model->person->puesto)) {
                                return Yii::t('app', 'No especificado.');
                                }else{
                                return $model->person->puesto;
                            }
                        },
                'label' => 'Puesto',
            ], 
        ],
    ]) ?>

</div>
