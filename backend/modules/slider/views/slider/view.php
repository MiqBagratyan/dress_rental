<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\Slider;

/* @var $this yii\web\View */
/* @var $model common\models\Slider */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Слайдеры', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="slider-view">

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
            'description',
            '_image',
            'sale_price',
            [
                'attribute' => 'status',
                'value' => function ($model) {
                    $statuses = Slider::statuses();
                    return $statuses[$model->status] ?? null;
                },
            ],
            'order',
            'created_at:datetime',
            'updated_at:datetime',
        ],
    ]) ?>

</div>
