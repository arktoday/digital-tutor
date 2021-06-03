<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tests".
 *
 * @property int $id
 * @property int|null $test_id
 * @property int|null $quest_id
 *
 * @property TestQuest $quest
 * @property TestTheme $test
 */
class Tests extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tests';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['test_id', 'quest_id'], 'integer'],
            [['quest_id'], 'exist', 'skipOnError' => true, 'targetClass' => TestQuest::className(), 'targetAttribute' => ['quest_id' => 'id']],
            [['test_id'], 'exist', 'skipOnError' => true, 'targetClass' => TestTheme::className(), 'targetAttribute' => ['test_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'test_id' => 'Test ID',
            'quest_id' => 'Quest ID',
        ];
    }

    /**
     * Gets query for [[Quest]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getQuest()
    {
        return $this->hasOne(TestQuest::className(), ['id' => 'quest_id']);
    }

    /**
     * Gets query for [[Test]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTest()
    {
        return $this->hasOne(TestTheme::className(), ['id' => 'test_id']);
    }
}
