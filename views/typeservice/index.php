<?php 
use yii\helpers\Html;

 ?>
<?php $this->title = "Tipos de Servicio"; ?>

<h2>Tipos de Servicio</h2>
<?php echo Html::a("Crear","/typeservice/create",array('class'=>'btn btn-success btn-xs')) ?>
<table class="table table-striped">
	<thead>
		<th>Title</th>
		<th>Value</th>
		<th></th>
	</thead>
	<?php foreach ($model as $key => $value): ?>
	<tr>
		<td><?php echo $value->title ?></td>
		<td><?php echo $value->value ?></td>
		<td>
			<?php echo Html::a('Editar',array('/typeservice/edit/','type_service_id'=>$value->type_service_id),array('class'=>'btn btn-warning btn-xs')) ?>
			<?php echo Html::a('Eliminar',array('/typeservice/delete/','type_service_id'=>$value->type_service_id),array('class'=>'btn btn-danger btn-xs',"onClick"=>"if(!confirm('Estas Seguro?')){ return false;}")) ?>
		</td>
	</tr>
	<?php endforeach ?>
</table>