<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;
use backend\widgets\Upload;
use yii\web\JsExpression;
use common\models\WorkProcedure;
use common\widgets\LanguagesForm;

/* @var $this yii\web\View */
/* @var $model common\models\WorkProcedure */
/* @var $form yii\bootstrap5\ActiveForm */
?>

<div class="work-procedure-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->errorSummary($model); ?>
    <div class="row">
        <div class="col-sm-4">
            <?= LanguagesForm::widget(['model' => $model, 'form' => $form]) ?>
        </div>
        <div class="col-sm-4">
            <?php echo $form->field($model, 'status')->dropDownList(
                WorkProcedure::statuses(),
                [
                    'class' => 'form-control',
                ]
            ); ?>

            <?php echo $form->field($model, 'order')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, '_image')->widget(
                Upload::class,
                [
                    'acceptFileTypes' => new JsExpression('/(\.|\/)(' . WorkProcedure::IMAGE_TYPE . ')$/i'),
                ]);
            ?>
        </div>
    </div>
    <div class="form-group">
        <?php echo Html::submitButton($model->isNewRecord ? 'Создать' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
