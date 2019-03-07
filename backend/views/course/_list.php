<?php
use yii\helpers\Html;
?>
    <li class="list-group-item">
        <?= Html::a($model->name, ['/course/item', 'id' => $model->id]); ?>
    </li>
