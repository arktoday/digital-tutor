<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "test_answ".
 *
 * @property int $id
 * @property string|null $value
 * @property int|null $quest_id
 * @property int|null $isright
 */
class TestAnsw extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'test_answ';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['value'], 'string'],
            [['quest_id', 'isright'], 'integer'],
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
            'quest_id' => 'Quest ID',
            'isright' => 'Isright',
        ];
    }
}
