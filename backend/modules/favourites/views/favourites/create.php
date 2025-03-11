<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Favourites */

$this->title = 'Создать Избранное';
$this->params['breadcrumbs'][] = ['label' => 'Избранное', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="favourites-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
