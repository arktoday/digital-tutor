<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "edprog_subj".
 *
 * @property int $id
 * @property int $edu_id
 * @property int $subj_id
 *
 * @property EduProg $edu
 * @property Subject $subj
 */
class EdprogSubj extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'edprog_subj';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['edu_id', 'subj_id'], 'required'],
            [['edu_id', 'subj_id'], 'integer'],
            [['edu_id'], 'exist', 'skipOnError' => true, 'targetClass' => EduProg::className(), 'targetAttribute' => ['edu_id' => 'id']],
            [['subj_id'], 'exist', 'skipOnError' => true, 'targetClass' => Subject::className(), 'targetAttribute' => ['subj_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'edu_id' => 'Edu ID',
            'subj_id' => 'Subj ID',
        ];
    }

    /**
     * Gets query for [[Edu]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEdu()
    {
        return $this->hasOne(EduProg::className(), ['id' => 'edu_id']);
    }

    /**
     * Gets query for [[Subj]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSubj()
    {
        return $this->hasOne(Subject::className(), ['id' => 'subj_id']);
    }
}
