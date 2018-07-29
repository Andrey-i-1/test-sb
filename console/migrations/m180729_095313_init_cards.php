<?php

use yii\db\Migration;

/**
 * Class m180729_095313_init_cards
 */
class m180729_095313_init_cards extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable("file", [
            "id" => $this->primaryKey(),
            "name" => $this->string()->notNull()->comment("Оригинальное имя файла"),
            "path" => $this->string()->notNull()->comment("Путь к файлу")
        ]);

        $this->createTable("card", [
            "id" => $this->primaryKey(),
            "title" => $this->string()->notNull()->comment("Заголовок"),
            "description" => $this->text()->notNull()->comment("Описание"),
            "image_id" => $this->integer()->comment("Файл с картинкой")
        ]);

        $this->addForeignKey("card_image_fk", "card", "image_id", "file", "id");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180729_095313_init_cards cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180729_095313_init_cards cannot be reverted.\n";

        return false;
    }
    */
}
