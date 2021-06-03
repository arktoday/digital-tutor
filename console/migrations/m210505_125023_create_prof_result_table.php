<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%prof_result}}`.
 */
class m210505_125023_create_prof_result_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%prof_result}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'real_type' => $this->text(),
            'int_type' => $this->text(),
            'soc_type' => $this->text(),
            'conv_type' => $this->text(),
            'ent_type' => $this->text(),
            'art_type' => $this->text(),
        ]);

        $this->createIndex(
            'idx-prof_result-user_id',
            'prof_result',
            'user_id'
        );

        $this->addForeignKey(
            'fk-prof_result-user_id',
            'prof_result',
            'user_id',
            'user',
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
            'fk-prof_result-user_id',
            'prof_result'
        );

        $this->dropIndex(
            'idx-prof_result-user_id',
            'prof_result'
        );

        $this->dropTable('{{%prof_result}}');
    }
}
