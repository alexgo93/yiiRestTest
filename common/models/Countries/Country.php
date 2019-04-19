<?php

namespace common\models\Countries;

use yii\db\ActiveRecord;
use yii\db\ActiveQuery;
use common\models\Cities\City;
use common\models\Cities\CityQuery;

/**
 * Class    City
 * @package common\models\Countries
 * @author  Alex Golenko
 * @version 2.0
 *
 * This is the model class for table "country".
 *
 * @property int    $id
 * @property string $code
 * @property string $name
 * @property int    $population
 *
 * Relations:
 * @property City   $city
 *
 */
class Country extends ActiveRecord
{
    public static function tableName(): string
    {
        return '{{%country}}';
    }

    /**
     * @inheritdoc
     * @return CountryQuery the active query used by this AR class.
     */
    public static function find(): CountryQuery
    {
        return new CountryQuery(static::class);
    }

    /**
     * Define rules for validation
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            [['code', 'name'], 'string'],
            [['id', 'population'], 'integer'],
            [['code', 'name', 'population'], 'required'],
        ];
    }

    /**
     * Get cities for country
     *
     * @return CityQuery|ActiveQuery
     */
    public function getCities(): CityQuery
    {
        return $this->hasMany(City::class, ['countryId' => 'id'])
            ->inverseOf('country');
    }

}