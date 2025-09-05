<?php

use yii\db\Migration;

class m250727_125451_remove_theme_setting extends Migration
{
    public function up()
    {
        \Yii::$app->getModule('dark-mode')->settings->delete('theme');
    }

    public function down()
    {
        echo "m250727_125451_remove_theme_setting does not support migration down.\n";
        return false;
    }
}
