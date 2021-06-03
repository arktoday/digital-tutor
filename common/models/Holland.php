<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "holland".
 *
 * @property int $id
 * @property string|null $a
 * @property string|null $b
 */
class Holland extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'holland';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['a', 'b'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'a' => 'A',
            'b' => 'B',
        ];
    }
}
