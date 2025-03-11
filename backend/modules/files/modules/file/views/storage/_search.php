<?php

use yii\bootstrap5\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model \backend\modules\files\modules\file\models\search\FileStorageItemSearch */
/* @var $form yii\bootstrap5\ActiveForm */
?>

<div class="file-storage-item-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?php echo $form->field($model, 'show_deleted')->checkbox()->label('Показать удаленные записи') ?>

    <div class="form-group hide">
        <?php echo Html::submitButton(Yii::t('backend', 'Search'), ['class' => 'btn btn-primary search_btn']) ?>
        <?php echo Html::resetButton(Yii::t('backend', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php
$script = <<<JS
    $('#filestorageitemsearch-show_deleted').on('click', function (){
        $('.search_btn').trigger('click')
    });
JS;

$this->registerJs($script, \yii\web\View::POS_END);
?>