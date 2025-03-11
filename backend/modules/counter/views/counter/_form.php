<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;
use common\models\Counter;
use common\widgets\LanguagesForm;

/* @var $this yii\web\View */
/* @var $model common\models\Counter */
/* @var $form yii\bootstrap5\ActiveForm */
?>

<div class="counter-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->errorSummary($model); ?>
    <div class="row">
        <div class="col-sm-4">
            <?= LanguagesForm::widget(['model' => $model, 'form' => $form]) ?>

        </div>
        <div class="col-sm-4">
            <?php echo $form->field($model, 'status')->dropDownList(
                Counter::statuses(),
                [
                    'class' => 'form-control',
                ]
            ); ?>

            <?php echo $form->field($model, 'count')->textInput() ?>

            <?php echo $form->field($model, 'order')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="form-group">
        <?php echo Html::submitButton($model->isNewRecord ? 'Создать' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
