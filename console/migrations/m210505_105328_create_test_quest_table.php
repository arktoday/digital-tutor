<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%test_quest}}`.
 */
class m210505_105328_create_test_quest_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%test_quest}}', [
            'id' => $this->primaryKey(),
            'value' => $this->text(),
            'quest_type' => $this->string()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%test_quest}}');
    }
}
