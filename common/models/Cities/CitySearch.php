<?php

namespace common\models\Cities;

use yii\data\ActiveDataProvider;

/**
 * Class    CitySearch
 * @package common\models\Cities
 * @author  Alex Golenko
 * @version 2.0
 *
 * CitySearch represents the model behind the search form about City.
 *
 * @see     City
 */
class CitySearch extends City
{

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
        ];
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search(array $params): ActiveDataProvider
    {
        $query = self::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);


        if (!$this->load($params) && $this->validate()) {
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id'        => $this->id,
            'city'      => $this->city,
            'countryId' => $this->countryId,
            'capital'   => $this->capital,
        ]);

        return $dataProvider;
    }
}
