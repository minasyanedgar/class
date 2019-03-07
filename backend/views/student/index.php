<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;
use common\models\Student;

$this->title = 'Students';
$this->params['breadcrumbs'][] = $this->title;

echo Html::tag('h1', 'Students list');
echo Html::a('Create new student', ['/student/create'], ['class' => 'btn btn-primary', 'style' => ['margin-right' => '10px']]);

$dataProvider = new ActiveDataProvider([
    'query' => Student::find(),
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

