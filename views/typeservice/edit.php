<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = "Formulario de Tipos de Servicio";
?>
<div class="row">

	<div class="col-md-6">
		<?php $form = ActiveForm::begin([
		    'id' => 'typeservice-form',
		]) ?>
		<h2>Tipos de Servicio</h2>
		<br>
		
		    <?= $form->field($model, 'title')->textInput() ?>
		    <?= $form->field($model, 'type_service_id')->hiddenInput()->label(false); ?>
		    <?= $form->field($model, 'value')->textInput() ?>
		   
		       
		    <?= Html::submitButton('Actualizar', ['class' => 'btn btn-primary']) ?>
		    <?= Html::a('Lista','/typeservice/index',['class'=>"btn btn-primary"]) ?>
		   
		<?php ActiveForm::end() ?>
		
	</div>
</div>