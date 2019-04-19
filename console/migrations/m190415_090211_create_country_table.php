<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%country}}`.
 */
class m190415_090211_create_country_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%country}}', [
            'code'       => $this->char(2)->notNull(),
            'name'       => $this->char(52)->notNull(),
            'population' => $this->integer(11)->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%country}}');
    }
}
