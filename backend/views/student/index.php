<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;
use common\models\Student;

$this->title = 'Students';
$this->params['breadcrumbs'][] = $this->title;

?>

<h1>Students list</h1>

<?= Html::a('Create new student', ['/student/create'], ['class' => 'btn btn-primary']);

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

