<?php
namespace api\modules\v1\models;
use \yii\db\ActiveRecord;
/**
 * Country Model
 *
 * @author Budi Irawan <deerawan@gmail.com>
 */
class Country extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName() : string
    {
        return 'country';
    }

    /**
     * @inheritdoc
     */
    public static function primaryKey() : array
    {
        return ['code'];
    }

    /**
     * Define rules for validation
     */
    public function rules() : array
    {
        return [
            [['code', 'name', 'population'], 'required']
        ];
    }
}