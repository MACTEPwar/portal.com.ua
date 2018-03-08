<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;

$this->title = 'Mail';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <div class="row" style="background-color:white">
        <?php
        NavBar::begin([
            'brandLabel' => $user->username,
            'brandUrl' => Yii::$app->homeUrl,
            'options' => [
                'class' => 'navbar-inverse ',
            ],
        ]);
        echo Nav::widget([
            'options' => ['class' => 'navbar-nav navbar-right'],
            'items' => [
                ['label' => 'Message', 'url' => ['/site/mail']],
            ],
        ]);
        NavBar::end();
        ?>
        <div class="container">
            <?php
                //var_dump($mail);
                foreach ($mail as $a)
                {
                    echo $a['sender']."-й пишет ".$a['recipient'].'-му                         '.$a['content'].'<hr>';
                }
            ?>
        </div>

    </div>

</div>
</div>
