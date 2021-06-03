<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "test_quest".
 *
 * @property int $id
 * @property string|null $value
 * @property string $quest_type
 *
 * @property Tests[] $tests
 */
class TestQuest extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'test_quest';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['value'], 'string'],
//            [['quest_type'], 'required'],
            [['quest_type'], 'string', 'max' => 256],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'value' => 'Value',
            'quest_type' => 'Quest Type',
        ];
    }

    /**
     * Gets query for [[Tests]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTests()
    {
        return $this->hasMany(Tests::className(), ['quest_id' => 'id']);
    }
}
