<?php

$this->title = 'Update teacher: ' . $model->getFullName();
$this->params['breadcrumbs'][] = ['label' => 'Students', 'url' => ['/teacher/index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<h2><?= $this->title ?></h2>
<hr>

<?= $this->render('_form', compact('model')) ?>