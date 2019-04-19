<?php

namespace common\models\Countries;

use yii\data\ActiveDataProvider;

/**
 * Class    CountrySearch
 * @package common\models\Countries
 * @author  Alex Golenko
 * @version 2.0
 *
 * CountrySearch represents the model behind the search form about Country.
 *
 * @see     Country
 */
class CountrySearch extends Country
{
    /**
     * Define rules for validation
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            [['id', 'population'], 'integer'],
            [['name', 'code'], 'string'],
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
            'id'         => $this->id,
            'code'       => $this->code,
            'name'       => $this->name,
            'population' => $this->population,
        ]);

        return $dataProvider;
    }
}
