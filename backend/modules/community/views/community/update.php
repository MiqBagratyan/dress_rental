<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Community */

$this->title = 'Обновить сообщество: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Сообщества', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="community-update">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
