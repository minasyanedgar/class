<?php

$this->title = 'New teacher';
$this->params['breadcrumbs'][] = ['label' => 'Teachers', 'url' => ['/teacher/index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<h2><?= $this->title ?></h2>
<hr>

<?= $this->render('_form', compact('model')) ?>