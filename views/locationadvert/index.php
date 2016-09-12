<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\LocationAdvertSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Location Adverts');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="location-advert-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Location Advert'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'description',
            'date_time',
            'site_id',
            'additional_comment',
            'city_id',
            // 'country_id',
            // 'coordinate',
            // 'location_advert_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
