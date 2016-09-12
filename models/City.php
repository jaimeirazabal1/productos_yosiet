<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "city".
 *
 * @property string $title
 * @property string $value
 * @property string $time_zone
 * @property integer $country_id
 * @property integer $city_id
 *
 * @property Country $country
 * @property LocationAdvert[] $locationAdverts
 * @property Profile[] $profiles
 */
class City extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'city';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'value', 'time_zone', 'country_id'], 'required'],
            [['country_id'], 'integer'],
            [['title', 'time_zone'], 'string', 'max' => 100],
            [['value'], 'string', 'max' => 200],
            [['value'], 'unique'],
            [['country_id'], 'exist', 'skipOnError' => true, 'targetClass' => Country::className(), 'targetAttribute' => ['country_id' => 'country_id']],
        ];
    }
    public function relations()
    {
        return array(
            'country'=>array(self::BELONGS_TO, 'Country', 'country_id'),
        );
    }
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'title' => Yii::t('app', 'Title'),
            'value' => Yii::t('app', 'Value'),
            'time_zone' => Yii::t('app', 'Time Zone'),
            'country_id' => Yii::t('app', 'Country ID'),
            'city_id' => Yii::t('app', 'City ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCountry()
    {
        return $this->hasOne(Country::className(), ['country_id' => 'country_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLocationAdverts()
    {
        return $this->hasMany(LocationAdvert::className(), ['city_id' => 'city_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProfiles()
    {
        return $this->hasMany(Profile::className(), ['city_id' => 'city_id']);
    }
}
