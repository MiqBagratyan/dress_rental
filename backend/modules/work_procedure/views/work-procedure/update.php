<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\WorkProcedure */

$this->title = 'Обновление процедуры работы: ' . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Рабочие процедуры', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="work-procedure-update">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
