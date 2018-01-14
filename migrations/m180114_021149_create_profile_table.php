<?php

use yii\db\Migration;

/**
 * Handles the creation of table `profile`.
 */
class m180114_021149_create_profile_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('profile',[
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'first_name' => $this->string()->notNull(),
            'last_name' => $this->string()->notNull(),
            'phone' => $this->string()->defaultValue(NULL),
            'city' => $this->string()->defaultValue(NULL),
            'country' => $this->string()->defaultValue(NULL),
            'address' => $this->text()->defaultValue(NULL),
        ],'ENGINE = InnoDB');
        $this->addForeignKey("profile_user_fk", "profile", "user_id", "user", "id", "CASCADE", "CASCADE");
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropForeignKey("profile_user_fk", "profile");
        $this->dropTable('profile');
    }
}
