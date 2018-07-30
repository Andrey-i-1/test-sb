<?php

/* @var $this yii\web\View */

/**
 * @var $models \common\models\CardElastic[]
 * @var $pages \yii\data\Pagination
 */

$this->title = 'Test app';
?>
<div class="site-index">
    <div class="row">
        <? foreach ($models as $model):?>
                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <img src="<?= Yii::$app->params["backend_url"] . $model->image_path?>" alt="...">
                        <div class="caption">
                            <h3><?= $model->title ?></h3>
                            <p><?= $model->description ?></p>
                            <p>Views: <?= $model->views_count ?></p>
                            <p><a href="<?= \yii\helpers\Url::to(["site/view", "id" => $model->id]) ?>" class="btn btn-primary" role="button">Detail</a></p>
                        </div>
                    </div>
                </div>
        <?endforeach;?>
    </div>
    <div class="row">
        <?
            // display pagination
            echo \yii\widgets\LinkPager::widget([
                'pagination' => $pages,
            ]);
        ?>
    </div>
</div>
