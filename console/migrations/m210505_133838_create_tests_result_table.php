<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%tests_result}}`.
 */
class m210505_133838_create_tests_result_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%tests_result}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'test_id' => $this->integer(),
            'result' => $this->integer()
        ]);

        $this->createIndex(
            'idx-tests_result-user_id',
            'tests_result',
            'user_id'
        );

        $this->addForeignKey(
            'fk-tests_result-user_id',
            'tests_result',
            'user_id',
            'user',
            'id',
            'CASCADE'
        );

        $this->createIndex(
            'idx-tests_result-test_id',
            'tests_result',
            'test_id'
        );

        $this->addForeignKey(
            'fk-tests_result-test_id',
            'tests_result',
            'test_id',
            'test_theme',
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
            'fk-tests_result-user_id',
            'tests_result'
        );

        $this->dropIndex(
            'idx-tests_result-user_id',
            'tests_result'
        );

        $this->dropForeignKey(
            'fk-tests_result-test_id',
            'tests_result'
        );

        $this->dropIndex(
            'idx-tests_result-test_id',
            'tests_result'
        );

        $this->dropTable('{{%tests_result}}');
    }
}
