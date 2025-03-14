<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Languages */

$this->title = 'Обновить языки: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Языки', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="languages-update">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
