<?php

/* @var $this yii\web\View */

use common\models\Subject;
use yii\helpers\Html;

$this->title = 'Тесты';
?>
<div class="site-tests">
    <h1><?= Html::encode($this->title) ?>
        <?= Html::a(
            'Создать тест',
            ['/site/test-create'],
            ['class' => 'btn btn-success']
        ) ?> </h1>
    <legend></legend>

    <? if ($tests) {
        foreach ($tests as $test) {
            if($test->subj_id != '-')
            $subject = Subject::find()->where(['id' => $test->subj_id])->one()->name;
            else $subject = $test->subj_id;
            echo "
            <div class='panel panel-default test-panel' >
                <div class='panel-body'>
                    {$test->name}
                    <br>
                    Дисциплина: {$subject}
                </div>
            </div>";
        }
    } ?>

</div>
