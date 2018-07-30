<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "card".
 *
 * @property int $id
 * @property string $title Заголовок
 * @property string $description Описание
 * @property int $image_id Файл с картинкой
 *
 * @property File $image
 */
class Card extends \yii\db\ActiveRecord
{

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'card';
    }

    public function init(){
        $this->on(self::EVENT_AFTER_INSERT, [$this, 'updateElastic']);
        $this->on(self::EVENT_AFTER_UPDATE, [$this, 'updateElastic']);
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'description'], 'required'],
            [['description'], 'string'],
            [['image_id'], 'integer'],
            [['title'], 'string', 'max' => 255],
            [['image_id'], 'exist', 'skipOnError' => true, 'targetClass' => File::className(), 'targetAttribute' => ['image_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Заголовок',
            'description' => 'Описание',
            'image_id' => 'Изображение',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getImage()
    {
        return $this->hasOne(File::className(), ['id' => 'image_id']);
    }

    protected function updateElastic(){
        $elasticCard = CardElastic::find()->where([
            "id" => $this->id
        ])->one();

        if(empty($elasticCard)){
            $elasticCard = new CardElastic();
        }

        $elasticCard->id = $this->id;
        $elasticCard->title = $this->title;
        $elasticCard->description = $this->description;
        $elasticCard->image_path = !empty($this->image_id) ? $this->image->path : null;
        $elasticCard->save();
    }
}