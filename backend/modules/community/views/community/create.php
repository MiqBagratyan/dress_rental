<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Community */

$this->title = 'Создать сообщество';
$this->params['breadcrumbs'][] = ['label' => 'Сообщества', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="community-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
