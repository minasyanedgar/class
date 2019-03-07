<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$form = ActiveForm::begin([
    'id' => 'students-form',
    'options' => [
        'class' => 'form-group',
        'style' => ['width' =>  '500px']
    ],
]);

echo $form->field($model, 'first_name')->textInput(['placeholder' => 'Enter first name'])->label('First Name');
echo $form->field($model, 'last_name')->textInput(['placeholder' => 'Enter last name'])->label('Last Name');
?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success', 'style' => ['width' => '120px']]) ?>
        <?= Html::a('Cancel', ['/student/index'], ['class' => 'btn btn-default']) ?>
    </div>
<?php ActiveForm::end();