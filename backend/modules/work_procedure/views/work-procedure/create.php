<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\WorkProcedure */

$this->title = 'Создать рабочую процедуру';
$this->params['breadcrumbs'][] = ['label' => 'Рабочие процедуры', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="work-procedure-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
