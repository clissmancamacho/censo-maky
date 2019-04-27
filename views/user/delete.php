<?php

use yii\helpers\Url;
use yii\helpers\Html;

$this->title = 'Eliminar';
?>
	<div style="text-align: center">
	    <h5>¿Quieres eliminar este usuario?</h5>
	</div>
		
	<div class="" style="margin-top: 20px; text-align: center">
	    <div class="btn btn-danger" data-dismiss="modal">Cancelar</div>
		<?= Html::a('Confirmar', ['delete', 'id' => $item->id], ['class' => 'btn btn-primary']) ?>
	</div>

	
