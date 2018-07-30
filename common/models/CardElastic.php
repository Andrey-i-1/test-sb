<?php

namespace common\models;

use Yii;
use yii\elasticsearch\ActiveRecord;

/**
 * @property int $id
 * @property int $views_count
 * @property string $title Заголовок
 * @property string $description Описание
 * @property int $image_path Путь к изображению
 */
class CardElastic extends ActiveRecord
{
    public function attributes()
    {
        return ['id', 'title', 'description', 'image_path', 'views_count'];
    }
}
