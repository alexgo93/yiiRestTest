<?php

use yii\db\Migration;

/**
 * Class m190415_095903_add_id_column_to_country
 */
class m190415_095903_add_id_column_to_country extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('country', 'id', $this->primaryKey());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190415_095903_add_id_column_to_country cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190415_095903_add_id_column_to_country cannot be reverted.\n";

        return false;
    }
    */
}
