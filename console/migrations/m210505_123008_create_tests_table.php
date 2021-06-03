<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%tests}}`.
 */
class m210505_123008_create_tests_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%tests}}', [
            'id' => $this->primaryKey(),
            'test_id' => $this->integer(),
            'quest_id' => $this->integer(),
        ]);

        $this->createIndex(
            'idx-tests-test_id',
            'tests',
            'test_id'
        );

        $this->addForeignKey(
            'fk-tests-test_id',
            'tests',
            'test_id',
            'test_theme',
            'id',
            'CASCADE'
        );

        $this->createIndex(
            'idx-tests-quest_id',
            'tests',
            'quest_id'
        );

        $this->addForeignKey(
            'fk-tests-quest_id',
            'tests',
            'quest_id',
            'test_quest',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(
            'fk-tests-test_id',
            'tests'
        );

        $this->dropIndex(
            'idx-tests-test_id',
            'tests'
        );

        $this->dropForeignKey(
            'fk-tests-quest_id',
            'tests'
        );

        $this->dropIndex(
            'idx-tests-quest_id',
            'tests'
        );

        $this->dropTable('{{%tests}}');
    }
}
