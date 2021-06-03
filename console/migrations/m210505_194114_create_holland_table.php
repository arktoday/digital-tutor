<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%holland}}`.
 */
class m210505_194114_create_holland_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%holland}}', [
            'id' => $this->primaryKey(),
            'a' => $this->string(),
            'b' => $this->string()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%holland}}');
    }
}
