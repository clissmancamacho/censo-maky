<?php
use dosamigos\exportable\ExportableButton; 
use dosamigos\exportable\helpers\TypeHelper;
use app\controllers\EnumColumn;
use yii\helpers\Html;
use dosamigos\grid\GridView;
use kartik\select2\Select2;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\ConsultaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Listado';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="listado-index">

    <div class="row">
        <div class="col-xs-6">
            <h1><?= Html::encode($this->title) ?></h1>
            <p>
                <?= Html::a('Agregar Persona', ['create'], ['class' => 'btn btn-success']) ?>
                <?= Html::a('<i class="glyphicon glyphicon-refresh"></i>', ['index'], ['class' => 'btn btn-default']) ?>
            </p>
        </div>
    </div>
 <div class="table-responsive">
        <?php $d = rand(1,1000000); ?>
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'layout' => "{toolbar}\n{items}\n{pager}",
                'behaviors' => [
                [
                    'class' => 'dosamigos\exportable\behaviors\ExportableBehavior',
                    'filename' => 'Listado-Censo' . $d,
                ],
                'dosamigos\grid\behaviors\ResizableColumnsBehavior',
                [
                    'class' => 'dosamigos\grid\behaviors\LoadingBehavior',
                    'type' => 'bars'
                ],
                [
                    'class' => 'dosamigos\grid\behaviors\ToolbarBehavior',
                    'options' => ['style' => 'margin-bottom: 5px'],
                    'encodeLabels' => false, // like this we will be able to display HTML on our buttons
                    'buttons' => [
                        ExportableButton::widget(
                            [
                                'label' => '<i class="glyphicon glyphicon-export">Exportar</i>',
                                'options' => ['class' => 'btn-success'],
                                'dropdown' => [
                                    'options' => ['class' => 'dropdown-menu-left']
                                ],
                                'types' => [
                                    TypeHelper::XLSX => 'Excel <span class="label label-default">.xlsx</span>'
                                ],
                            ]
                        )
                    ]
                ]
            ],
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
                    [
                        'attribute' => 'person_cedula',
                        'value' => 'person.cedula',
                        'label' => 'Cedula',
                        'filterInputOptions' => [
                            'class'       => 'form-control',
                            'placeholder' => 'Buscar'
                        ],
                    ],
                    [
                        'attribute' => 'person_direccion',
                        'value' => 'person.direccion',
                        'label' => 'Dirección',
                        'filterInputOptions' => [
                            'class'       => 'form-control',
                            'placeholder' => 'Buscar'
                        ],
                    ],
                    [
                        'attribute' => 'person_barrio',
                        'value' => 'person.barrio',
                        'label' => 'Barrio',
                        'filterInputOptions' => [
                            'class'       => 'form-control',
                            'placeholder' => 'Buscar'
                        ],
                    ],
                    [
                        'attribute' => 'person_telefono',
                        'value' => 'person.telefono',
                        'label' => 'Teléfono',
                        'filterInputOptions' => [
                            'class'       => 'form-control',
                            'placeholder' => 'Buscar'
                        ],
                    ],
                    [
                        'attribute' => 'person_zona',
                        'value' => 'person.zona',
                        'label' => 'Zona',
                        'filterInputOptions' => [
                            'class'       => 'form-control',
                            'placeholder' => 'Buscar'
                        ],
                    ],
                    [
                        'attribute' => 'person_puesto',
                        'value' => 'person.puesto',
                        'label' => 'Puesto',
                        'filterInputOptions' => [
                            'class'       => 'form-control',
                            'placeholder' => 'Buscar'
                        ],
                    ],
                ],
            ]); ?>
    </div>

</div>
