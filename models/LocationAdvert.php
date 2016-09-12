<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "location_advert".
 *
 * @property string $description
 * @property string $date_time
 * @property integer $site_id
 * @property string $additional_comment
 * @property integer $city_id
 * @property integer $country_id
 * @property string $coordinate
 * @property integer $location_advert_id
 *
 * @property Advert[] $adverts
 * @property Advert[] $adverts0
 * @property City $city
 * @property Country $country
 * @property ServiceSite $site
 */
class LocationAdvert extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'location_advert';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['description', 'site_id', 'city_id', 'country_id'], 'required'],
            [['date_time'], 'safe'],
            [['site_id', 'city_id', 'country_id'], 'integer'],
            [['description'], 'string', 'max' => 300],
            [['additional_comment', 'coordinate'], 'string', 'max' => 500],
            [['city_id'], 'exist', 'skipOnError' => true, 'targetClass' => City::className(), 'targetAttribute' => ['city_id' => 'city_id']],
            [['country_id'], 'exist', 'skipOnError' => true, 'targetClass' => Country::className(), 'targetAttribute' => ['country_id' => 'country_id']],
            [['site_id'], 'exist', 'skipOnError' => true, 'targetClass' => ServiceSite::className(), 'targetAttribute' => ['site_id' => 'service_site_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'description' => Yii::t('app', 'Description'),
            'date_time' => Yii::t('app', 'Date Time'),
            'site_id' => Yii::t('app', 'Site ID'),
            'additional_comment' => Yii::t('app', 'Additional Comment'),
            'city_id' => Yii::t('app', 'City ID'),
            'country_id' => Yii::t('app', 'Country ID'),
            'coordinate' => Yii::t('app', 'Coordinate'),
            'location_advert_id' => Yii::t('app', 'Location Advert ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAdverts()
    {
        return $this->hasMany(Advert::className(), ['location_from' => 'location_advert_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAdverts0()
    {
        return $this->hasMany(Advert::className(), ['location_to' => 'location_advert_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCity()
    {
        return $this->hasOne(City::className(), ['city_id' => 'city_id']);
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
    public function getSite()
    {
        return $this->hasOne(ServiceSite::className(), ['service_site_id' => 'site_id']);
    }
}
