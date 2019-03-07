<?php
use yii\helpers\Html;

?>

<h2>Course: <?=$model->name?></h2>
<h4>Teacher: <?= $model->teacher->getFullName()?></h4>

<p  class="text-danger">Schedule:</p>

<?php

//\yii\helpers\VarDumper::dump($model->schedule->attributes);
//exit;
//foreach($model->schedule as $schedule) {
//    echo $schedule
//}

$schedule = $model->schedule;
for ($i = 1; $i <= 5; $i++) {
    echo jddayofweek($i - 1, 1) . '<br>';
    foreach (['start', 'end'] as $pos) {
        $field = 'day_' . $i . '_' . $pos;
        echo $pos . ': ' . $schedule->$field . ' <br> ';
//        echo $form->field($model->schedule, 'day_' . $i . '_' . $pos, ['options' => ['class' => 'col-md-6']])
//            ->dropdownList(Schedule::getTimes(), [
//                'prompt' => 'Choose ' . $pos . ' time'
//            ])->label(false);
    }
    echo '<br>';
}

?>


<h4 class="text-danger">Students:</h4>
<p>
    <?php
    $studentsList = [];
    foreach($model->students as $student) {
        $studentsList[] = $student->getFullName();
    }

    echo implode(', ', $studentsList);
    ?>
</p>

<?= Html::a('Back', ['/course/list'], ['class' => 'btn btn-primary'])?>