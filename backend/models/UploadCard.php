<?php

namespace backend\models;

use common\models\Card;
use common\models\File;
use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "file".
 *
 * @property int $id
 * @property string $name Оригинальное имя файла
 * @property string $path Путь к файлу
 *
 * @property Card[] $cards
 */
class UploadCard extends Card
{
    /**
    * @var UploadedFile
    */
    public $imageFile;

    public function rules()
    {
        $base = parent::rules();
        return array_merge($base, [
            [['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg'],
        ]);
    }

    public function upload()
    {
        if (!empty($this->imageFile) && $this->validate()) {
            $file = new File();
            $file->name = $this->imageFile->baseName . '.' . $this->imageFile->extension;
            $now = new \DateTime();
            $filename = md5($now->getTimestamp()).'.'.$this->imageFile->extension;
            $file->path = '/uploads/' .$filename;
            if($file->save() && $this->imageFile->saveAs(Yii::getAlias("@backend").'/web/uploads/'.$filename)){
                $this->image_id = $file->id;
                return true;
            }
        }
        return false;
    }
}
