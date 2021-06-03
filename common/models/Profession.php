<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "profession".
 *
 * @property int $id
 * @property string $name
 * @property string $pers_type
 */
class Profession extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'profession';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'pers_type'], 'required'],
            [['name'], 'string', 'max' => 256],
            [['pers_type'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'pers_type' => 'Pers Type',
        ];
    }
}
