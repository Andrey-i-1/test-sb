<?php

use yii\db\Migration;

/**
 * Class m180729_100501_add_admin_user
 */
class m180729_100501_add_admin_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $user = new \common\models\User();
        $user->username = "admin";
        $user->email = "admin@test.ru";
        $user->generatePasswordResetToken();
        $user->generateAuthKey();
        $user->setPassword("123456");
        if(!$user->save()){
            print_r($user->errors);
            return false;
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180729_100501_add_admin_user cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180729_100501_add_admin_user cannot be reverted.\n";

        return false;
    }
    */
}
