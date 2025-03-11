<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Counter */

$this->title = 'Обновить посещения: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Посещения', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="counter-update">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
