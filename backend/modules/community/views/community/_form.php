<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;
use backend\widgets\Upload;
use yii\web\JsExpression;
use common\models\Community;
use common\widgets\LanguagesForm;

/* @var $this yii\web\View */
/* @var $model common\models\Community */
/* @var $form yii\bootstrap5\ActiveForm */
?>

<div class="community-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->errorSummary($model); ?>
    <div class="row">
        <div class="col-sm-4">
            <?= LanguagesForm::widget(['model' => $model, 'form' => $form]) ?>

            <?= $form->field($model, '_image')->widget(
                Upload::class,
                [
                    'acceptFileTypes' => new JsExpression('/(\.|\/)(' . Community::IMAGE_TYPE . ')$/i'),
                ]);
            ?>
        </div>
        <div class="col-sm-4">
            <?php echo $form->field($model, 'status')->dropDownList(
                Community::statuses(),
                [
                    'class' => 'form-control',
                ]
            ); ?>

            <?php echo $form->field($model, 'order')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="form-group">
        <?php echo Html::submitButton($model->isNewRecord ? 'Создать' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
