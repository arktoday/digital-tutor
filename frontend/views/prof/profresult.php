<?php

use common\models\Faculty;
use common\models\Subject;
use yii\helpers\Html;
use yii\widgets\LinkPager;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ProfResultSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Результаты теста';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="prof-result-index">

    <legend><h1><?= Html::encode($this->title) ?></h1>
        <h5>
            <big style="line-height: normal">
                Предлагаем вам ознакомиться с результатами пройденного теста.
            </big>
        </h5>
        <h6>
            <big>
                На каждый ответ был подобран определенный тип личности.
            </big>
        </h6>
    </legend>

    <h5>Реалистический: <?= $results->real_type ?></h5>
    <div class="progress" style="width: 30%">
        <div class="progress-bar progress-bar-info" style="width: <?= $results->real_type ?>0%"></div>
    </div>
    <h5>Интеллектуальный: <?= $results->int_type ?></h5>
    <div class="progress" style="width: 30%">
        <div class="progress-bar progress-bar-success" style="width: <?= $results->int_type ?>0%"></div>
    </div>
    <h5>Социальный: <?= $results->soc_type ?></h5>
    <div class="progress" style="width: 30%">
        <div class="progress-bar progress-bar-warning" style="width: <?= $results->soc_type ?>0%"></div>
    </div>
    <h5>Конвенциональный: <?= $results->conv_type ?></h5>
    <div class="progress" style="width: 30%">
        <div class="progress-bar progress-bar-danger" style="width: <?= $results->conv_type ?>0%"></div>
    </div>
    <h5>Предпринимательский: <?= $results->ent_type ?></h5>
    <div class="progress" style="width: 30%">
        <div class="progress-bar progress-bar-primary" style="width: <?= $results->ent_type ?>0%"></div>
    </div>
    <h5>Артистический: <?= $results->art_type ?></h5>
    <div class="progress" style="width: 30%">
        <div class="progress-bar progress-bar-success" style="width: <?= $results->art_type ?>0%"></div>
    </div>

    <big>Общий график распределения:</big>
    <div class="progress">
        <div class="progress-bar progress-bar-info" style="width: <?= $results->real_type / 30 * 100 ?>%"></div>
        <div class="progress-bar progress-bar-success" style="width: <?= $results->int_type / 30 * 100 ?>%"></div>
        <div class="progress-bar progress-bar-warning" style="width: <?= $results->soc_type / 30 * 100 ?>%"></div>
        <div class="progress-bar progress-bar-danger" style="width: <?= $results->conv_type / 30 * 100 ?>%"></div>
        <div class="progress-bar progress-bar-primary" style="width: <?= $results->ent_type / 30 * 100 ?>%"></div>
        <div class="progress-bar progress-bar-success" style="width: <?= $results->art_type / 30 * 100 ?>%"></div>
    </div>


    <big><?

        if ($results->real_type >= 5) {
            echo '<p>Вам свойственна эмоциональная стабильность, ориентация на настоящее.
            <br>Представители <b>реалистического</b> типа занимаются конкретными объектами и их практическим использованием: вещами, инструментами, машинами. 
            Отдают предпочтение занятиям требующим моторных навыков, ловкости, конкретности.</p>';
        }
        if ($results->int_type >= 5) {
            echo '<p>Людей, относящихся к <b>интеллектуальный</b>  типу, отличают аналитические способности, рационализм, независимость и оригинальность мышления, умение точно формулировать и излагать свои мысли, решать логические задачи, генерировать новые идеи. 
        <br>Они часто выбирают научную и исследовательскую работу. Им нужна свобода для творчества. Работа способна увлечь их настолько, что стирается грань между рабочим временем и досугом. Мир идей для них может быть важнее, чем общение с людьми.</p>';
        }
        if ($results->soc_type >= 5) {
            echo '<p><b>Социальный</b> тип ставит перед собой такие цели и задачи, которые позволяют им установить тесный контакт с окружающей социальной средой. Обладает социальными умениями и нуждается в социальных контактах. Стремятся поучать, воспитывать. Гуманны. Способны приспособиться практически к любым условиям. Стараются держаться в стороне от интеллектуальных проблем. 
        <br>Они активны и решают проблемы, опираясь главным образом на эмоции, чувства и умение общаться.</p>';
        }
        if ($results->conv_type >= 5) {
            echo '<p><b>Конвенциональный</b> тип отдает предпочтение четко структурированной деятельности. Из окружающей его среды он выбирает цели, задачи и ценности, проистекающие из обычаев и обусловленные состоянием общества. Ему характерны серьезность настойчивость, консерватизм, исполнительность. 
        <br>В соответствии с этим его подход к проблемам носит стереотипичный, практический и конкретный характер.</p>';
        }
        if ($results->ent_type >= 5) {
            echo '<p>Можно отметить, что вы находчивы, практичны, быстро ориентируетесь в сложной обстановке, склонны к самостоятельному принятию решений, социально активны, готовы рисковать, ищите острые ощущения. Любите и умеете общаться. Избегаете занятий, требующих усидчивости, большой и длительной концентрации внимания. Для вас значимо материальное благополучие. 
        <br>Предпочитаете деятельность, требующую энергии, организаторских способностей, связанную с руководством, управлением и влиянием на людей.</p>';
        }
        if ($results->art_type >= 5) {
            echo '<p>Люди <b>артистического</b> типа оригинальны, независимы в принятии решений, редко ориентируются на социальные нормы и одобрение, обладают необычным взглядом на жизнь, гибкостью мышления, эмоциональной чувствительностью. Отношения с людьми строят, опираясь на свои ощущения, эмоции, воображение, интуицию. Они не выносят жесткой регламентации, предпочитая свободный график работы. 
        Часто выбирают профессии, связанные с литературой, театром, кино, музыкой, изобразительным искусством.</p>';
        }

        ?></big>


    <legend></legend>


    <h4>Рекомендуемые профессии: </h4>

    <big>
        <?
        if ($professions['real']) {
            echo '- ';
            foreach ($professions['real'] as $prof) {
                echo "{$prof->name}, ";
            }
            echo '<br>';
        }
        if ($professions['int']) {
            echo '- ';
            foreach ($professions['int'] as $prof) {
                echo "{$prof->name}, ";
            }
            echo '<br>';
        }
        if ($professions['soc']) {
            echo '- ';
            foreach ($professions['soc'] as $prof) {
                echo "{$prof->name}, ";
            }
            echo '<br>';
        }
        if ($professions['conv']) {
            echo '- ';
            foreach ($professions['conv'] as $prof) {
                echo "{$prof->name}, ";
            }
            echo '<br>';
        }
        if ($professions['ent']) {
            echo '- ';
            foreach ($professions['ent'] as $prof) {
                echo "{$prof->name}, ";
            }
            echo '<br>';
        }
        if ($professions['art']) {
            echo '- ';
            foreach ($professions['art'] as $prof) {
                echo "{$prof->name}, ";
            }
            echo '<br>';
        } ?>
    </big>

    <h4>Рекомендуемые направления обучения в РЭУ им. Г.В. Плеханова: </h4>

    <?
    foreach ($edu_progs as $ed) { ?>
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title"><?= $ed->profile ?></h3>
            </div>
            <div class="panel-body">
                <span><b>Направление:</b> <?= $ed->direction ?></span>
                <br>
                <span><b>Факультет:</b> <?= Faculty::find()->select(['name'])->where(['id' => $ed->faculty_id])->one()->name ?></span>
                <br>
                <span><b>Проходной балл за прошлый год:</b> <?= $ed->score ? $ed->score : '-' ?></span>
                <br>
                <span><b>Стоимость обучения (руб. в год):</b> <?= $ed->price ? number_format($ed->price, 0, '', ' ') : '-' ?></span>
                <br>
                <span><b>Бюджетные места:</b> <?= $ed->places ? $ed->places : '-' ?></span>
                <br>
                <span><b>Перечень вступительных испытаний:</b>
                    <? foreach (Subject::findBySql('SELECT name from Subject WHERE id in (SELECT subj_id FROM edprog_subj WHERE edu_id = ' . $ed->id . ')')->all() as $item) { echo $item->name . ' | '; } ?>
                </span>
                <span></span>
            </div>
        </div>
    <? } ?>

    <?= LinkPager::widget([
        'pagination' => $pages,
    ]); ?>

</div>