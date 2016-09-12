<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "service_site".
 *
 * @property string $title
 * @property string $value
 * @property integer $service_site_id
 *
 * @property LocationAdvert[] $locationAdverts
 */
class ServiceSite extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'service_site';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'value'], 'required'],
            [['title', 'value'], 'string', 'max' => 200],
            [['value'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'title' => Yii::t('app', 'Title'),
            'value' => Yii::t('app', 'Value'),
            'service_site_id' => Yii::t('app', 'Service Site ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLocationAdverts()
    {
        return $this->hasMany(LocationAdvert::className(), ['site_id' => 'service_site_id']);
    }
}
