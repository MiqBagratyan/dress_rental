<?php
use yii\helpers\Url;

$bundle = \backend\assets\BackendAsset::register($this);
$currentUrl = Yii::$app->request->pathInfo;
$currentLanguage = Yii::$app->language;

function createLanguageUrl($language) {
    return Url::to(["/$language/" . Yii::$app->controller->route] + Yii::$app->request->queryParams);
}
?>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="<?=$assetDir?>/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">SHOP</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <nav class="mt-2">
            <?php
            echo \hail812\adminlte\widgets\Menu::widget([
                'items' => [
                    [
                        'label' => 'Слайдер',
                        'icon' => 'fas fa-sliders-h',
                        'active' => Yii::$app->controller->id == 'slider',
                        'url' => ['/slider/slider/index']
                    ],
                    [
                        'label' => 'Процедура работы',
                        'icon' => 'fas fa-project-diagram',
                        'active' => Yii::$app->controller->id == 'work_procedure',
                        'url' => ['/work_procedure/work-procedure/index']
                    ],
                    [
                        'label' => 'Наши фавориты',
                        'icon' => 'fas fa-star',
                        'active' => Yii::$app->controller->id == 'favourites',
                        'url' => ['/favourites/favourites/index']
                    ],
                    [
                        'label' => 'Сообщество',
                        'icon' => 'fas fa-fax',
                        'active' => Yii::$app->controller->id == 'community',
                        'url' => ['/community/community/index']
                    ],
                    [
                        'label' => 'Количество посещений',
                        'icon' => 'far fa-eye',
                        'active' => Yii::$app->controller->id == 'counter',
                        'url' => ['/counter/counter/index']
                    ],
                    [
                        'label' => 'Языки',
                        'icon' => 'fas fa-language',
                        'active' => Yii::$app->controller->id == 'languages',
                        'url' => ['/languages/languages/index']
                    ],
                ],
            ]);
            ?>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>