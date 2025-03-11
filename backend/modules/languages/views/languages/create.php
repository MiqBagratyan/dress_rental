<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Languages */

$this->title = 'Создать языки';
$this->params['breadcrumbs'][] = ['label' => 'Языки', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="languages-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
