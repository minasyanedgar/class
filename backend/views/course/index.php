<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;
use common\models\Course;
use common\models\Teacher;

$this->title = 'Courses';
$this->params['breadcrumbs'][] = $this->title;

?>

<h1>Courses list</h1>

<?= Html::a('Create new course', ['/course/create'], ['class' => 'btn btn-primary']);

$dataProvider = new ActiveDataProvider([
    'query' => Course::find(),
    'pagination' => [
        'pageSize' => 20,
    ],
]);
echo GridView::widget([
    'dataProvider' => $dataProvider,
    'options' => ['style' => ['margin-top' => '20px']],
    'columns' => [
        'id',
        'name',
        [
            'label' => 'Teacher',
            'content' => function ($model, $key, $index, $column) {
                return Teacher::getAll()[$model->teacher_id];
            }
        ],
        [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{update} {delete}',
        ],
    ],
]);

