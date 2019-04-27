<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\Banco */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="censo-form">

    <?php $form = ActiveForm::begin(["enableAjaxValidation" => true]); ?>
	<div class="col-sm-12 col-md-12 col-lg-12 label-required"> 
		<p class="left-align">Nota: Los campos con (<span style="color:#F44336">*</span>) son requeridos.</p>
	</div>
    <div class="row">
        <div class="col-sm-12 col-md-4 col-lg-4">
            <?= $form->field($person, 'nombre', [
                'inputOptions'=>['type' => 'text', 'class' => 'form-control', 'maxlength' => '60']
            ])
            ->label('Nombre<span style="color:#F44336">*</span>')
            ->textInput() ?>
        </div>
        <div class="col-sm-12 col-md-4 col-lg-4">
            <?= $form->field($person, 'apellido', [
                'inputOptions'=>['type' => 'text', 'class' => 'form-control', 'maxlength' => '60']
            ])
            ->label('Apellido<span style="color:#F44336">*</span>')
            ->textInput() ?>
        </div>
        <div class="col-sm-12 col-md-4 col-lg-4">
            <?= $form->field($person, 'cedula', [
                'inputOptions'=>['type' => 'text', 'class' => 'form-control', 'maxlength' => '60']
            ])
            ->label('Cedula<span style="color:#F44336">*</span>')
            ->textInput() ?>
        </div>  
    </div>
    <div class="row">
        <div class="col-sm-12 col-md-6 col-lg-6">
            <?= $form->field($person, 'telefono', [
                'inputOptions'=>['type' => 'text', 'class' => 'form-control', 'maxlength' => '60']
            ])
            ->label('Teléfono')
            ->textInput() ?>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-6">
            <?= $form->field($person, 'barrio', [
                'inputOptions'=>['type' => 'text', 'class' => 'form-control', 'maxlength' => '60']
            ])
            ->label('Barrio')
            ->textInput() ?>
        </div>
    </div>
    <div class="row">
    	<div class="col-sm-12 col-md-6 col-lg-6">
            <?= $form->field($person, 'zona', [
                'inputOptions'=>['type' => 'text', 'class' => 'form-control', 'maxlength' => '60']
            ])
            ->label('Zona')
            ->textInput() ?>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-6">
            <?= $form->field($person, 'puesto', [
                'inputOptions'=>['type' => 'text', 'class' => 'form-control', 'maxlength' => '60']
            ])
            ->label('Puesto')
            ->textInput() ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <?= $form->field($person, 'direccion', [
                'inputOptions'=>['type' => 'text', 'class' => 'form-control', 'maxlength' => '255']
            ])
            ->label('Dirección')
            ->textArea() ?>
        </div>
    </div>  
    
    <div class="form-group">
       <div class="row">
            <div class="col-md-2 col-md-offset-5">
        		<?= Html::submitButton($model->isNewRecord ? 'Agregar Persona' : 'Actualizar Persona', ['class' => $model->isNewRecord ? 'btn btn-success btn-md' : 'btn btn-primary']) ?>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<script src="<?= Yii::getAlias('@web/js/jquery.numeric.js')?> "> </script>
<script src="<?= Yii::getAlias('@web/js/initNumericValidation.js')?> "> </script>
