<?php


use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Регистрация';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>
    <?php
        $form = ActiveForm::begin([
                'class' => 'form-horizontal',
                'id' => 'login-form',
                'layout' => 'horizontal',
                'fieldConfig' => [
                    'template' => "{label}\n<div class=\"col-lg-4\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
                    'labelOptions' => ['class' => 'col-lg-1 control-label'],
        ],
        ]);
    ?>

    <?= $form->field($model,'username')->textInput(['autofocus' => true])->label("Логин")?>

    <?= $form->field($model,'password')->passwordInput()->label("Пароль")?>

    <?= html::submitButton('Зарегистрироваться', ['class' => 'btn btn btn-primary','name' => 'signin']);?>
    <?= html::button('Назад', ['class' => 'btn btn-primary']);?>

    <?php
        ActiveForm::end();
    ?>

</div>