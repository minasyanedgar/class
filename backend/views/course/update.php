<?php

$this->title = 'Update course: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Courses', 'url' => ['/course/index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<h2><?= $this->title ?></h2>
<hr>

<?= $this->render('_form', compact('model')) ?>