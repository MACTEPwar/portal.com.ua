<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <pre>
        <?php var_dump($users_all[0]['id']); ?>
    </pre>

    <code><?= __FILE__ ?></code>
</div>
