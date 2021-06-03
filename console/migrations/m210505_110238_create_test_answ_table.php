<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%test_answ}}`.
 */
class m210505_110238_create_test_answ_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%test_answ}}', [
            'id' => $this->primaryKey(),
            'value' => $this->text(),
            'quest_id' => $this->integer(),
            'isright' => $this->smallInteger()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%test_answ}}');
    }
}
