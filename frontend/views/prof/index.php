<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ProfResultSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Тест Холланда';
$this->params['breadcrumbs'][] = $this->title;
?>
<h5 class="prof-result-index">

    <legend><h1><?= Html::encode($this->title) ?></h1></legend>

    <h5>
        <p><big style="line-height: normal">Предлагаем вам пройти опросник профессиональных предпочтений по методике
                Джона Льюиса Холланда
                для помощи в выборе дальнейшго направления обучения.</big></p>
        <p><span style="line-height: normal">Из каждой пары профессий выберите одну, наиболее привлекательную для вас.
                <br>Необходимо выбрать все варианты
                ответов, иначе тест не будет считаться завершенным.</span></p>
    </h5>


    <?php foreach ($items as $item): ?>
        <div class="">
            <div class="radio fs17">
                <label>
                    <input type="radio" name="optionsRadios<?= $item->id ?>" id="a<?= $item->id ?>"
                           value="a<?= $item->id ?>">
                    <big><?= $item->a ?></big>
                </label>
            </div>
            <div class="radio">
                <label>
                    <input type="radio" name="optionsRadios<?= $item->id ?>" id="b<?= $item->id ?>"
                           value="b<?= $item->id ?>">
                    <big><?= $item->b ?></big>
                </label>
            </div>
        </div>
        <legend></legend>
    <?php endforeach; ?>

    <?=
    Html::beginForm()
    . Html::submitButton('Завершить тест', ['class' => 'btn btn-info sendtest'])
    . Html::endForm();
    ?>

    </div>

    <script src="/js/proftest.js">