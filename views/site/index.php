<?php

/* @var $this yii\web\View */

use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;

$this->title = 'My Yii Application';
?>
<div class="site-index">


    <div class="body-content">

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
                Сдесь будет контент<hr><h1>Контент</h1>
            </div>

        </div>

    </div>
</div>
