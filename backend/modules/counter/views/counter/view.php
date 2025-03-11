<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\Counter;

/* @var $this yii\web\View */
/* @var $model common\models\Counter */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Посещения', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="counter-view">

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
            'users',
            'period',
            'count',
            [
                'attribute' => 'status',
                'value' => function ($model) {
                    $statuses = Counter::statuses();
                    return $statuses[$model->status] ?? null;
                },
            ],
            'order',
            'created_at:datetime',
            'updated_at:datetime',
        ],
    ]) ?>

</div>
