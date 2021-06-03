<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "test_theme".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $subj_id
 *
 * @property Tests[] $tests
 * @property TestsResult[] $testsResults
 */
class TestTheme extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'test_theme';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 255],
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
            'subj_id' => 'Subj',
        ];
    }

    /**
     * Gets query for [[Tests]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTests()
    {
        return $this->hasMany(Tests::className(), ['test_id' => 'id']);
    }

    /**
     * Gets query for [[TestsResults]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTestsResults()
    {
        return $this->hasMany(TestsResult::className(), ['test_id' => 'id']);
    }
}
