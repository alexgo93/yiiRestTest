<?php

use yii\db\Migration;

/**
 * Class m190415_095525_insert_rows_in_country
 */
class m190415_095525_insert_rows_in_country extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->batchInsert('{{%country}}', ['code', 'name', 'population'],[
            ['AU', 'Australia', 24016400],
            ['BR', 'Brazil', 205722000],
            ['CA', 'Canada', 35985751],
            ['CN', 'China', 1375210000],
            ['DE', 'Germany', 81459000],
            ['FR', 'France', 64513242],
            ['GB', 'United Kingdom', 65097000],
            ['IN', 'India', 1285400000],
            ['RU', 'Russia', 146519759],
            ['US', 'United States', 322976000]
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190415_095525_insert_rows_in_country cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190415_095525_insert_rows_in_country cannot be reverted.\n";

        return false;
    }
    */
}
