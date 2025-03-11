<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;
use common\models\Languages;

/* @var $this yii\web\View */
/* @var $model common\models\Languages */
/* @var $form yii\bootstrap5\ActiveForm */

?>

<div class="languages-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->errorSummary($model); ?>
    <div class="row">
        <div class="col-sm-4">
            <?php echo $form->field($model, 'code')->textInput(['maxlength' => true]) ?>

            <?php echo $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

            <?php echo $form->field($model, 'status')->dropDownList(
                Languages::statuses(),
                [
                    'class' => 'form-control',
                ]
            ); ?>
        </div>
        <div class="col-sm-4">
            <?php echo $form->field($model, 'flag')->textInput(['maxlength' => true]) ?>

            <?php echo $form->field($model, 'order')->textInput() ?>
        </div>
    </div>
    <div class="form-group">
        <?php echo Html::submitButton($model->isNewRecord ? Yii::t('common', 'Create') : Yii::t('common', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
