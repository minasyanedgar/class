<?php

use common\models\Schedule;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Teacher;

$form = ActiveForm::begin([
    'id' => 'students-form',
    'options' => [
        'class' => 'form-group',
        'style' => ['width' =>  '500px']
    ],
]);

    echo $form->field($model, 'name')->textInput(['placeholder' => 'Enter course name'])->label('Course Name');

    echo $form->field($model, 'teacher_id')
            ->dropdownList(Teacher::getAll(), ['prompt' => 'Select teacher'])
            ->label('Teacher');
    ?>

    <h3>Schedule</h3>
    <hr>
    <div class="form-group row">
        <?php

//        \yii\helpers\VarDumper::dump($model->schedule->day_2_end);
//        exit;
        for ($i = 1; $i <= 5; $i++) {
            echo Html::label(jddayofweek($i - 1, 1), '', ['class' => 'col-md-12']);
            foreach (['start', 'end'] as $pos) {
                echo $form->field($model->schedule, 'day_' . $i . '_' . $pos, ['options' => ['class' => 'col-md-6']])
                    ->dropdownList(Schedule::getTimes(), [
                        'prompt' => 'Choose ' . $pos . ' time'
                    ])->label(false);
            }
        }
        ?>
    </div>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success', 'style' => ['width' => '120px']]) ?>
        <?= Html::a('Cancel', ['/course/index'], ['class' => 'btn btn-default']) ?>
    </div>
<?php ActiveForm::end();