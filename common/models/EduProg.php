<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "edu_prog".
 *
 * @property int $id
 * @property string $direction
 * @property string $profile
 * @property int $faculty_id
 * @property int|null $score
 * @property float|null $price
 * @property int|null $places
 * @property string $pers_type
 *
 * @property EdprogSubj[] $edprogSubjs
 */
class EduProg extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'edu_prog';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['direction', 'profile', 'faculty_id', 'pers_type'], 'required'],
            [['faculty_id', 'score', 'places'], 'integer'],
            [['price'], 'number'],
            [['direction', 'profile'], 'string', 'max' => 255],
            [['pers_type'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'direction' => 'Direction',
            'profile' => 'Profile',
            'faculty_id' => 'Faculty ID',
            'score' => 'Score',
            'price' => 'Price',
            'places' => 'Places',
            'pers_type' => 'Pers Type',
        ];
    }

    /**
     * Gets query for [[EdprogSubjs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEdprogSubjs()
    {
        return $this->hasMany(EdprogSubj::className(), ['edu_id' => 'id']);
    }
}
