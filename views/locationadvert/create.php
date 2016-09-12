<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Country;
use app\models\ServiceSite;

/* @var $this yii\web\View */
/* @var $model app\models\LocationAdvert */

$this->title = Yii::t('app', 'Create Location Advert');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Location Adverts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="location-advert-create">

    <h1><?= Html::encode($this->title) ?></h1>
	<?php     $form = ActiveForm::begin();
    echo $form->field($model, 'site_id')
        ->dropDownList(
            ArrayHelper::map(
            					ServiceSite::find()->all(), 
            					'service_site_id', 
            					'title'
            				)
        )->label("Sitio");
    echo $form->field($model,'coordinate')->textInput()->label('Coordenadas');
	echo $form->field($model,'description')->textarea()->label('Descripción');
	echo $form->field($model,'additional_comment')->textarea()->label('Comentario Adicional');
    echo $form->field($model, 'country_id')
        ->dropDownList(
            ArrayHelper::map(
            					Country::find()->all(), 
            					'country_id', 
            					'title'
            				),array('onChange'=>'buscar_ciudad();')
        )->label("Pais");
    ?>
	<div class="form-group">
		<label>Ciudad</label>
		<div id="ciudad_select">
			<select name="LocationAdvert[city_id]" id="city_select" class="form-control" required>
				<option value="">Select A Country First</option>
			</select>
		</div>
	</div>
	<input type="submit" value="Guardar" class="btn btn-primary">
    <?php
    ActiveForm::end(); ?>

</div>
<script type="text/javascript">
		function buscar_ciudad(){
			var url = "<?php echo Yii::$app->urlManager->createUrl(['city/ajaxindex']) ?>";
			$.ajax({
				url:url,
				type:'post',
				data:{ajaxindex:1,country_id:$("#locationadvert-country_id").val()},
				dataType:'json',
				success:function(r){
					$("#city_select").html('');
					for (var i = 0; i < r.length; i++) {
						$("#city_select").append("<option value='"+r[i].city_id+"'>"+r[i].title+"</option>");
					}

				}
			})
		}

window.onload=function(){
		buscar_ciudad();
};
</script>