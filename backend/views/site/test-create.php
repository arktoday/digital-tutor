<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Создание теста';
?>
<div class="site-test-create">
    <h1><?= Html::encode($this->title) ?></h1>

    <div class="form-group" style="width: 50%">
        <label class="control-label" for="focusedInput">Название теста: </label>
        <input class="form-control testname" id="focusedInput" type="text">
        <br>
        <label class="control-label" for="record-status">Дисциплина:</label>
        <select id="#subj" class="form-control subj" style="width: 50%">
            <option value="-">-</option>
            <option value="1">Математика</option>
            <option value="2">Русский язык</option>
            <option value="3">Информатика и ИКТ</option>
            <option value="5">История</option>
            <option value="6">Обществознание</option>
            <option value="7">Иностранный язык</option>
            <option value="8">Литература</option>
            <option value="9">Живопись</option>
            <option value="10">Рисунок</option>
            <option value="11">Биология</option>
            <option value="12">Физика</option>
            <option value="13">Химия</option>
        </select>
    </div>

    <div class="form-group" style="display: inline-block">
        <label class="control-label" for="input-count">Количество вопросов:</label>
        <input type="number" class="form-control" id="input-count" min="1" title="минимальное значение: 1">
    </div>

    <a class="btn btn-success btn-count">Добавить</a>

    <div class="test-container"></div>

    <br>
    <a class="btn btn-success createtest hideelem">Создать</a>
</div>

<script src="/admin/js/test-create.js">
