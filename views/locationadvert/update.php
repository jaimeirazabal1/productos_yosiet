<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\LocationAdvert */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Location Advert',
]) . $model->location_advert_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Location Adverts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->location_advert_id, 'url' => ['view', 'id' => $model->location_advert_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="location-advert-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
