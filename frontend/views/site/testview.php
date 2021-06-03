<?php

/* @var $this yii\web\View */

use common\models\ProfResult;
use common\models\TestAnsw;
use common\models\TestQuest;
use yii\helpers\Html;
use yii\widgets\LinkPager;

$this->title = $test->name;
$this->params['breadcrumbs'][] = $this->title;
echo "<div name={$test->id} class='site-testview'>";
?>

<?

foreach ($tests as $t) {
    $quest = TestQuest::find()->where(['id' => $t->quest_id])->one();
    $answs = TestAnsw::find()->where(['quest_id' => $quest->id])->all();
    $inpType = ($quest->quest_type == 0) ? 'radio' : 'checkbox';
    $hint = ($quest->quest_type == 0) ? 'один вариант ответа' : 'несколько вариантов ответа';
    echo "<div class='quest-container'>$quest->value ($hint)";
    foreach ($answs as $answ) {
        echo "<div class='radio-cont'>
                    <input name='{$quest->id}' type='{$inpType}' class='radio-check'/> <span class='check-span'>$answ->value</span>
                  </div>";
    }
    echo "</div>";
    echo '<hr>';
}

echo Html::a(
    'Завершить',
    [''],
    ['class' => 'btn btn-success finishtest']
);

echo "<br><br>".Html::a(
    'Вернуться',
    ['site/account'],
    ['class' => 'btn btn-warning']
);

?>

</div>

<script src="/js/testview.js">
