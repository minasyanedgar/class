<?php

use common\models\Course;
use yii\data\ActiveDataProvider;
use yii\widgets\ListView;

$dataProvider = new ActiveDataProvider([
    'query' => Course::find(),
    'pagination' => [
        'pageSize' => 20,
    ],
]);

echo '<ul class="list-group">';
echo ListView::widget([
    'dataProvider' => $dataProvider,
    'itemView' => '_list',
]);
echo '</ul>';