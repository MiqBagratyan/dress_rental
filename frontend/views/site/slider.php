<?php

/** @var \yii\web\View $this */

/** @var string $content */

use frontend\assets\AppAsset;
use yii\bootstrap5\Html;

AppAsset::register($this);
?>

<div class="banner">
    <div class="owl-carousel owl-theme dr-main-slider">
        <div class="item">
            <?= Html::img('../img/banner/2.jpg', ['alt' => '', 'class' => 'img-responsive']) ?>
            <div class="text">
                <h4>new <span>50%<br/> <small>discount</small></span></h4>
                <h2>Spring</h2>
                <h3>~ MAKE YOUR CLOSET THE UNIQUE ONE ~</h3>
                <a href="#">GET THE LOOK</a>
            </div>
        </div>
        <div class="item">
            <?= Html::img('../img/banner/3.jpg', ['alt' => '', 'class' => 'img-responsive']) ?>
            <div class="text2">
                <h2>Hot Sale!</h2>
                <p>Spring & winter</p>
                <a href="#">GET THE LOOK</a>
            </div>
        </div>
    </div>
</div>
