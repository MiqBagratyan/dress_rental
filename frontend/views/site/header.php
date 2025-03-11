<?php

/** @var \yii\web\View $this */

/** @var string $content */

use frontend\assets\AppAsset;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

AppAsset::register($this);
?>
<div id="gl-circle-loader-wrapper">
    <div id="gl-circle-loader-center">
        <div class="gl-circle-load">
            <img src="../img/ploading.gif" alt="Page Loader">
        </div>
    </div>
</div>

<div class="header-search open-search">
    <div class="container">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1">
                <div class="navbar-search">
                    <form class="search-global">
                        <input class="search-global__input" type="text" placeholder="Type to search" autocomplete="off"
                               name="s" value=""/>
                        <button class="search-global__btn"><i class="icon stroke icon-Search"></i>
                        </button>
                        <div class="search-global__note">Begin typing your search above and press return to search.
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <button class="search-close close" type="button"><i class="fa fa-times"></i></button>
</div>

<div class="top-bar" id="top_bar">
    <div class="container">
        <p class="font-14-ope-reg-0 text-center margin-0">
            <?= Html::encode('…Enjoy 20% off when you sign up to become a member...') ?>
        </p>
        <i class="ion-ios-close-empty"></i>
    </div>
</div>
<header class="main-nav" id="stickynav">
    <?php NavBar::begin([
        'brandLabel' => Html::img('../img/logo.png', ['alt' => 'logo']),
        'innerContainerOptions' => ['class' => 'container-fluid'],
    ]); ?>
    <?= Nav::widget([
        'options' => ['class' => 'nav navbar-nav'],
        'items' => [
            ['label' => 'Home', 'url' => ['/site/index']],
            [
                'label' => 'COLLECTIONS',
                'items' => [
                    ['label' => 'List View', 'url' => ['/collections/list']],
                    ['label' => 'Grid View', 'url' => ['/collections/grid']],
                    ['label' => 'Grid View 2', 'url' => ['/collections/grid2']],
                ],
            ],
            [
                'label' => 'DESIGNER',
                'items' => [
                    ['label' => 'Aidan Mattox', 'url' => '#'],
                    ['label' => 'Alberta Feretti', 'url' => '#'],
                    ['label' => 'Alex Perry', 'url' => '#'],
                    ['label' => 'Alexander McQueen', 'url' => '#'],
                    ['label' => 'Alice + Olivia', 'url' => '#'],
                ],
            ],
            ['label' => 'Our Blog', 'url' => ['/blog/index']],
            ['label' => 'ABOUT', 'url' => ['/site/about']],
            ['label' => 'CONTACT', 'url' => ['/site/contact']],
            ['label' => 'Login', 'url' => ['/site/contact']],
            ['label' => 'Wishlist', 'url' => ['/site/contact']],
            ['label' => 'Cart', 'url' => ['/site/contact']],

        ],
    ]) ?>
    <?php NavBar::end() ?>

</header>