<?php

use yii\db\Migration;

/**
 * Class m190423_082107_init
 * @author  Alex Golenko
 * @version 2.0
 */
class m190423_082107_init extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute(file_get_contents(__DIR__ . '/init_schema.sql'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->execute(file_get_contents(__DIR__ . '/drop_schema.sql'));
    }

}
