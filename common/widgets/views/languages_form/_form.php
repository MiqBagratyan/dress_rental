<?php

/* @var $this yii\web\View */
?>
<div class="card card-primary card-outline card-outline-tabs">
    <div class="card-header p-0 border-bottom-0">
        <ul class="nav nav-tabs" id="languages-tab" role="tablist">
            <?php foreach ($languages as $key => $value) { ?>
                <li class="nav-item">
                    <a class="nav-link" id="languages-tabs-for-<?= $key ?>-tab" data-toggle="pill"
                       href="#languages-tabs-for-<?= $key ?>" role="tab" aria-controls="languages-tabs-for-<?= $key ?>"
                       aria-selected="true"><?= $value ?></a>
                </li>
            <?php } ?>
        </ul>
    </div>
    <div class="card-body">
        <div class="tab-content" id="languages-tabContent">
            <?php foreach ($languages as $key => $value) { ?>
                <div class="tab-pane fade" id="languages-tabs-for-<?= $key ?>" role="tabpanel"
                     aria-labelledby="languages-tabs-for-<?= $key ?>">
                    <?php foreach ($attributes as $attribute) { ?>
                        <?php if ($key == $defaultLanguage) { ?>
                            <?=$form->field($model, "$attribute")->textInput(); ?>
                        <?php } else{  ?>
                            <?=$form->field($model, "$attribute".'_'."$key")->textInput(); ?>
                        <?php } ?>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>
    </div>
    <!-- /.card -->
</div>
<?php
$script = <<< JS
   $('#languages-tab li:first-child a').tab('show');
JS;
$this->registerJs($script);
?>
