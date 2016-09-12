<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ServiceSite */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Service Site',
]) . $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Service Sites'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->service_site_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="service-site-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
