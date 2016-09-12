<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "country".
 *
 * @property string $title
 * @property string $value
 * @property string $currency
 * @property integer $country_id
 *
 * @property City[] $cities
 * @property LocationAdvert[] $locationAdverts
 * @property Profile[] $profiles
 */
class Country extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'country';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'value', 'currency'], 'required'],
            [['title', 'currency'], 'string', 'max' => 100],
            [['value'], 'string', 'max' => 200],
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
            'currency' => Yii::t('app', 'Currency'),
            'country_id' => Yii::t('app', 'Country ID'),
        ];
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCities()
    {
        return $this->hasMany(City::className(), ['country_id' => 'country_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLocationAdverts()
    {
        return $this->hasMany(LocationAdvert::className(), ['country_id' => 'country_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProfiles()
    {
        return $this->hasMany(Profile::className(), ['country_id' => 'country_id']);
    }
}
