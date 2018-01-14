<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Handles the creation of table `user`.
 */
class m180114_015923_create_user_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        
        $this->createTable('user', [
            'id' => $this->primaryKey(),
            'username' => Schema::TYPE_STRING . ' NOT NULL UNIQUE',
            'auth_key' => Schema::TYPE_STRING . '(32) NOT NULL',
            'password_hash' => Schema::TYPE_STRING . ' NOT NULL',
            'password_reset_token' => Schema::TYPE_STRING . ' UNIQUE',
            'email' => Schema::TYPE_STRING . ' NOT NULL UNIQUE',
            'status' => Schema::TYPE_SMALLINT . ' NOT NULL DEFAULT 10',
            'created_at' => Schema::TYPE_INTEGER . ' NOT NULL',
            'updated_at' => Schema::TYPE_INTEGER . ' NOT NULL',
        ],"ENGINE=InnoDB");
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('user');
    }
}
