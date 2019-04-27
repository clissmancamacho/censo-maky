<?php
use app\controllers\EnumColumn;
use yii\helpers\Html;
use dosamigos\grid\GridView;
use kartik\select2\Select2;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\ConsultaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Usuarios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <div class="row">
        <div class="col-xs-6">
            <h1><?= Html::encode($this->title) ?></h1>
            <p>
                <?= Html::a('Crear Usuario', ['create'], ['class' => 'btn btn-success']) ?>
                <?= Html::a('<i class="glyphicon glyphicon-refresh"></i>', ['index'], ['class' => 'btn btn-default']) ?>
            </p>
        </div>
    </div>
 <div class="table-responsive">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    [
                        'header' => 'Acciones',
                        'class' => 'yii\grid\ActionStatus',
                        'template' => '{view} {update} {delete}',
                        'contentOptions' => [
                            'style' => 'width:115px;  min-width:115px;'
                        ]
                    ],
                    [
                        'attribute' => 'username',
                        'label' => 'Usuario',
                        'filterInputOptions' => [
                            'class'       => 'form-control',
                            'placeholder' => 'Buscar'
                        ],
                        'contentOptions' => [
                        ]
                    ],
                    [
                        'attribute' => 'email',
                        'label' => 'Email',
                        'filterInputOptions' => [
                            'class'       => 'form-control',
                            'placeholder' => 'Buscar'
                        ],
                    ],
                    [
                        'attribute' => 'person_nombre',
                        'value' => 'person.nombre',
                        'label' => 'Nombre',
                        'filterInputOptions' => [
                            'class'       => 'form-control',
                            'placeholder' => 'Buscar'
                        ],
                    ],
                    [
                        'attribute' => 'person_apellido',
                        'value' => 'person.apellido',
                        'label' => 'Apellido',
                        'filterInputOptions' => [
                            'class'       => 'form-control',
                            'placeholder' => 'Buscar'
                        ],
                    ],
                ],
            ]); ?>
    </div>

</div>
