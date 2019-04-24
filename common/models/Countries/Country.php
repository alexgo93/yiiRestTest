<?php

namespace common\models\Countries;

use MP\Services\ImplementServices;
use yii\db\ActiveRecord;
use common\models\Cities\City;
use common\services\CountryService;

/**
 * Class    City
 * @package common\models\Countries
 * @author  Alex Golenko
 * @version 2.0
 *
 * This is the model class for table "country".
 *
 * @property int            $id
 * @property string         $code
 * @property string         $name
 * @property int            $population
 *
 * Relations:
 * @property City           $city
 *
 * Services
 * @property CountryService $countriesService
 *
 */
class Country extends ActiveRecord
{
    use ImplementServices;

    public static function tableName(): string
    {
        return '{{%country}}';
    }

    /**
     * @inheritdoc
     * @return CountryQuery the active query used by this AR class.
     */
    public static function find(): ?CountryQuery
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
     * @inheritdoc
     */
    public static function services(): array
    {
        return [
            'countriesService' => CountryService::class,
        ];
    }

}