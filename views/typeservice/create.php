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
		    <?= $form->field($model, 'title')->textInput(array('setOnEmpty' => true)) ?>
		    <?= $form->field($model, 'value')->textInput(array( 'value' => mt_rand(),'setOnEmpty' => true)) ?>
		   
		       
		    <?= Html::submitButton('Crear', ['class' => 'btn btn-primary']) ?>
			<?php echo Html::a("Lista","/typeservice/index",array('class'=>'btn btn-primary')) ?>
		   
		<?php ActiveForm::end() ?>
		
	</div>
</div>