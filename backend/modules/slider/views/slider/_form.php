<?php

use common\models\Slider;
use yii\bootstrap5\ActiveForm;
use yii\helpers\Html;
use backend\widgets\Upload;
use yii\web\JsExpression;
use common\widgets\LanguagesForm;

/* @var $this yii\web\View */
/* @var $model common\models\Slider */
/* @var $form yii\bootstrap5\ActiveForm */

$languages = Yii::$app->params['languagesLabel'];
$behaviors = $model->getBehavior('ml');
$defaultLanguage = $behaviors->defaultLanguage;
?>

<div class="slider-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->errorSummary($model); ?>
    <div class="row">

        <div class="col-sm-4">
            <?= LanguagesForm::widget(['model' => $model, 'form' => $form]) ?>

            <?= $form->field($model, '_image')->widget(
                Upload::class,
                [
                    'acceptFileTypes' => new JsExpression('/(\.|\/)(' . Slider::IMAGE_TYPE . ')$/i'),
                ]);
            ?>
        </div>

        <div class="col-sm-4">
            <?php echo $form->field($model, 'sale_price')->textInput() ?>

            <?php echo $form->field($model, 'status')->dropDownList(
                Slider::statuses(),
                [
                    'class' => 'form-control',
                ]
            ); ?>

            <?php echo $form->field($model, 'order')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-sm-4">

        </div>
    </div>
    <div class="form-group">
        <?php echo Html::submitButton($model->isNewRecord ? 'Создать' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
