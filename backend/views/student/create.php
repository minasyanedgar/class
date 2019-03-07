<?php

$this->title = 'New student';
$this->params['breadcrumbs'][] = ['label' => 'Students', 'url' => ['/student/index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<h2><?= $this->title ?></h2>
<hr>

<?= $this->render('_form', compact('model')) ?>