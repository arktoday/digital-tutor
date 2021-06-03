<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "prof_result".
 *
 * @property int $id
 * @property int $user_id
 * @property int $real_type
 * @property int $int_type
 * @property int $soc_type
 * @property int $conv_type
 * @property int $ent_type
 * @property int $art_type
 *
 * @property User $user
 */
class ProfResult extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'prof_result';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'real_type', 'int_type', 'soc_type', 'conv_type', 'ent_type', 'art_type'], 'required'],
            [['user_id', 'real_type', 'int_type', 'soc_type', 'conv_type', 'ent_type', 'art_type'], 'integer'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'real_type' => 'Real Type',
            'int_type' => 'Int Type',
            'soc_type' => 'Soc Type',
            'conv_type' => 'Conv Type',
            'ent_type' => 'Ent Type',
            'art_type' => 'Art Type',
        ];
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
