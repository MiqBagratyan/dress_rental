<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Favourites */

$this->title = 'Обновить избранное: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Избранное', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="favourites-update">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
