<?php

namespace api\modules\v1\models;

use \yii\db\ActiveRecord;

/**
 * Country Model
 *
 * @author Alex Golenko <alekseimell5644@gmail.com>
 */
class Country extends ActiveRecord
{
    /**
     *
     * @inheritdoc
     *
     * @return string
     */
    public static function tableName(): string
    {
        return 'country';
    }

    /**
     * @inheritdoc
     *
     * @return array
     */
    public static function primaryKey(): array
    {
        return ['id'];
    }

    /**
     * Define rules for validation
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            [['code', 'name', 'population'], 'required'],
        ];
    }
}
