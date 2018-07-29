<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "file".
 *
 * @property int $id
 * @property string $name Оригинальное имя файла
 * @property string $path Путь к файлу
 *
 * @property Card[] $cards
 */
class File extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'file';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'path'], 'required'],
            [['name', 'path'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Оригинальное имя файла',
            'path' => 'Путь к файлу',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCards()
    {
        return $this->hasMany(Card::className(), ['image_id' => 'id']);
    }
}
