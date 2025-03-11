<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\Favourites;

/* @var $this yii\web\View */
/* @var $model common\models\Favourites */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Избранное', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="favourites-view">

    <p>
        <?php echo Html::a('Обновить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?php echo Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?php echo DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'style',
            'price',
            '_image',
            [
                'attribute' => 'status',
                'value' => function ($model) {
                    $statuses = Favourites::statuses();
                    return $statuses[$model->status] ?? null;
                },
            ],
            'order',
            'created_at:datetime',
            'updated_at:datetime',
        ],
    ]) ?>

</div>
