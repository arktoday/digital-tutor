<?php

/* @var $this yii\web\View */

use common\models\ProfResult;
use common\models\Subject;
use common\models\Tests;
use common\models\TestsResult;
use yii\helpers\Html;
use yii\widgets\LinkPager;

$this->title = 'Личный кабинет';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-account">
    <h1><?= Html::encode($this->title) ?></h1>
    <h3>Имя пользователя: <?= Yii::$app->user->identity->username ?></h3>
    <?
    echo Html::a(
        'Сменить пароль',
        ['/site/request-password-reset'],
        ['class' => 'btn btn-success']
    );
    echo '<hr>';
    if (ProfResult::findOne(['user_id' => Yii::$app->user->identity->getId()])) {
        echo '<p>' . Html::a(
                'Просмотреть маршрут обучения',
                ['/prof/profresult'],
                ['class' => 'btn btn-primary']
            ) . '</p>';
        echo '<p>' . Html::a(
                'Построить новый маршрут обучения',
                ['/prof/index'],
                ['class' => 'btn btn-warning']
            ) . '</p>';
    } else {
        echo Html::a(
            'Построить маршрут обучения',
            ['/prof/index'],
            ['class' => 'btn btn-primary']
        );
    }
    echo '<hr>';
    echo '<h3>Тесты</h3>';

    if ($tests) {
        foreach ($tests as $test) {
            $tresult = ($result = TestsResult::findOne(['user_id' => Yii::$app->user->id, 'test_id' => $test->id])) ? $result->result : 0;
            $questCount = Tests::find()->where(['test_id' => $test->id])->count();
            if ($test->subj_id != '-')
                $subject = Subject::find()->where(['id' => $test->subj_id])->one()->name;
            else $subject = $test->subj_id;
            echo "
            <div class='panel panel-default test-panel' >
                <div class='panel-body' style='font-size: 14px'>" .
                Html::a('Пройти "' . $test->name . '"', ['site/testview', 'id' => $test->id]) .
                "<br>
                 <b>Дисциплина:</b> " . $subject .
                "<br>
                <b>Ваш результат:</b> " . $tresult . "/" . $questCount . "
                </div>
            </div>";
        }
    }
    ?>


</div>
