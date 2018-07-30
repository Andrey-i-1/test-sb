<?php

/* @var $this yii\web\View */

/**
 * @var $card \common\models\Card[]
 */

$this->title = 'Test app';
?>
<div class="site-index">
    <div class="row">
        <div class="col-md-12">
            <div class="thumbnail">
                <img src="<?= Yii::$app->params["backend_url"] . $card->image_path?>" alt="...">
                <div class="caption">
                    <h3><?= $card->title ?></h3>
                    <p><?= $card->description ?></p>
                    <p>Views: <?= $card->views_count ?></p>

                </div>
            </div>
        </div>
    </div>
</div>
