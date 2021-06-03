<?php

use common\models\ProfResultSearch;
use fedemotta\datatables\DataTables;
use kartik\export\ExportMenu;
use yii\grid\GridView;

/* @var $this yii\web\View */

$this->title = 'Цифровой тьютор';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Результаты теста Холланда</h1>

        <?php
        $columns = [
            ['attribute' => 'user_id',
                'label' => 'Пользователь',
                'value' => function ($model, $index, $widget) {
                    return $model->user->username;
                }],
            ['attribute' => 'real_type', 'label' => 'Реалистический'],
            ['attribute' => 'int_type', 'label' => 'Интеллектуальный'],
            ['attribute' => 'soc_type', 'label' => 'Социальный'],
            ['attribute' => 'conv_type', 'label' => 'Конвенциональный'],
            ['attribute' => 'ent_type', 'label' => 'Предпринимательский'],
            ['attribute' => 'art_type', 'label' => 'Артистический'],
        ];

        echo '<div style="width: fit-content; margin: 30px 0;">';
        echo ExportMenu::widget([
            'dataProvider' => $dataProvider,
            'columns' => $columns,
            'exportConfig' => [
                ExportMenu::FORMAT_TEXT => false,
                ExportMenu::FORMAT_HTML => false,
            ],
            'filename' => 'export_prof',
            'columnSelectorOptions' => [
                'class' => 'btn btn-default'
            ],
            'dropdownOptions' => [
                'label' => 'Экспорт',
                'class' => 'btn btn-info',
                'export' => true,
                'toolbar' => [
                    '{export}',
                    '{toggleData}'
                ]
            ],
        ]);
        echo '</div>';

        ?>

        <?= DataTables::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                ['attribute' => 'user_id',
                    'label' => 'Пользователь',
                    'value' => function ($model, $index, $widget) {
                        return $model->user->username;
                    }],
                ['attribute' => 'real_type', 'label' => 'Реалистический'],
                ['attribute' => 'int_type', 'label' => 'Интеллектуальный'],
                ['attribute' => 'soc_type', 'label' => 'Социальный'],
                ['attribute' => 'conv_type', 'label' => 'Конвенциональный'],
                ['attribute' => 'ent_type', 'label' => 'Предпринимательский'],
                ['attribute' => 'art_type', 'label' => 'Артистический']
            ],
            'clientOptions' => [
                'language' => [
                    'url' => "http://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Russian.json"
                ]
            ],
        ]); ?>
    </div>
</div>

