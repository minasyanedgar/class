<?php

use common\models\Course;
use common\models\Student;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Assign course to student';
$this->params['breadcrumbs'][] = $this->title;


$form = ActiveForm::begin([
    'id' => 'students-form',
    'options' => [
        'class' => 'form-group',
        'style' => ['width' =>  '500px']
    ],
]);

echo $form->field($model, 'student_id')
    ->dropdownList(Student::getAll(), ['prompt' => 'Select student'])
    ->label('Student');

echo $form->field($model, 'course_id')
    ->dropdownList(Course::getAll(), ['prompt' => 'Select course'])
    ->label('Course');

?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success', 'style' => ['width' => '120px']]) ?>
        <?= Html::a('Cancel', ['/course/index'], ['class' => 'btn btn-default']) ?>
    </div>
<?php ActiveForm::end();
