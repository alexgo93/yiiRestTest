<?php

namespace common\models\Cities;


use yii\db\ActiveRecord;
use yii\db\ActiveQuery;
use common\models\Countries\Country;
use common\models\Countries\CountryQuery;

/**
 * Class    City
 * @package common\models\Cities
 * @author  Alex Golenko
 * @version 2.0
 *
 * This is the model class for table "cities".
 *
 * @property int     $id
 * @property int     $countryId
 * @property bool    $capital
 * @property string  $city
 *
 * Relations:
 * @property Country $country
 *
 */
class City extends ActiveRecord
{
    public static function tableName(): string
    {
        return '{{%city}}';
    }

    /**
     * @inheritdoc
     * @return CityQuery the active query used by this AR class.
     */
    public static function find(): CityQuery
    {
        return new CityQuery(static::class);
    }

    /**
     * Define rules for validation
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            [['id', 'countryId'], 'integer'],
            [['city'], 'string'],
            [['capital'], 'boolean'],
            [['city', 'countryId', 'capital'], 'required'],
        ];
    }

    /**
     * Get country
     *
     * @return CountryQuery|ActiveQuery
     */
    public function getCountry(): CountryQuery
    {
        return $this->hasOne(Country::class, ['id' => 'countryId'])
            ->inverseOf('city');
    }

}