<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Counter */

$this->title = 'Создание посещений';
$this->params['breadcrumbs'][] = ['label' => 'Посещения', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="counter-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
