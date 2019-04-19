<?php

namespace common\models\Cities;

use yii\db\ActiveQuery;


/**
 * Class    CityQuery
 * @package common\models\Cities
 * @author  Alex Golenko
 * @version 2.0
 *
 * This is the ActiveQuery class for [[City]].
 *
 * @see     City
 *
 */
class CityQuery extends ActiveQuery
{

    /**
     * Only capital cities
     *
     * @return self
     */
    public function isCapital(): self
    {
        $this->andWhere(['capital' => true]);

        return $this;
    }

}
