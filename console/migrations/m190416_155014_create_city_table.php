<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%city}}`.
 */
class m190416_155014_create_city_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%city}}', [
            'id'        => $this->primaryKey(),
            'city'      => $this->char(15)->notNull(),
            'countryId' => $this->integer(2)->notNull(),
            'capital'   => $this->boolean()->notNull(),
        ]);
        $this->batchInsert('{{%city}}', ['city', 'countryId', 'capital'],[
            ['Sydney', 1, false],
            ['Canberra', 1, true],
            ['Rio', 2, true],
            ['San Paulo', 2, false],
            ['Toronto', 3, false],
            ['Montreal', 3, false],
            ['Pekin', 4, true],
            ['Shanghai', 4, false],
            ['Hong Kong', 4, false],
            ['Berlin', 5, true],
            ['Hamburg',5, false],
            ['Paris', 6, true],
            ['London', 7, true],
            ['Wales', 7, false],
            ['Scotland', 7, false],
            ['Mumbai', 8, false],
            ['Delhi', 8, true],
            ['Moscow', 9, true],
            ['Smolensk', 9, false],
            ['Penza', 9, false],
            ['Washington', 10, true],
            ['New York', 10, false],
            ['Las Vegas', 10, false],
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%city}}');
    }
}
