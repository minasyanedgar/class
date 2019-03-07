<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;
use common\models\Teacher;

$this->title = 'Teachers';
$this->params['breadcrumbs'][] = $this->title;

?>

<h1>Teachers list</h1>

<?= Html::a('Create new teacher', ['/teacher/create'], ['class' => 'btn btn-primary']);

$dataProvider = new ActiveDataProvider([
    'query' => Teacher::find(),
    'pagination' => [
        'pageSize' => 20,
    ],
]);
echo GridView::widget([
    'dataProvider' => $dataProvider,
    'options' => ['style' => ['margin-top' => '20px']],
    'columns' => [
        'id',
        'first_name',
        'last_name',
        [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{update} {delete}',
        ],
    ],
]);

