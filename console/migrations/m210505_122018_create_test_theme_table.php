<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%test_theme}}`.
 */
class m210505_122018_create_test_theme_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%test_theme}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'subj' => $this->string()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%test_theme}}');
    }
}
