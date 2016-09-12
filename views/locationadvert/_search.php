<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\LocationAdvertSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="location-advert-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'description') ?>

    <?= $form->field($model, 'date_time') ?>

    <?= $form->field($model, 'site_id') ?>

    <?= $form->field($model, 'additional_comment') ?>

    <?= $form->field($model, 'city_id') ?>

    <?php // echo $form->field($model, 'country_id') ?>

    <?php // echo $form->field($model, 'coordinate') ?>

    <?php // echo $form->field($model, 'location_advert_id') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
