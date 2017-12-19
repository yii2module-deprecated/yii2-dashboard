<?php

/* @var $this yii\web\View
 * @var $logs array
 */

$this->title = t('dashboard/main', 'title');

?>

<div class="dashboard-index">
	
	<?php if($logs) { ?>
        <div class="alert alert-warning">
			<?= t('dashboard/main', 'has_logs {link}', ['link' => 'logreader']) ?>
        </div>
	<?php } ?>
	<div class="jumbotron">
		<h1><?= t('dashboard/main', 'hello') ?></h1>

		<p class="lead"><?= t('this/main', 'text') ?></p>
		
	</div>

</div>
