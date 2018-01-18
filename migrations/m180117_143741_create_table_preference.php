<?php

use yii\db\Migration;

/**
 * Class m180117_143741_create_table_preference
 */
class m180117_143741_create_table_preference extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable("preference", [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'departure_date' => $this->integer(),
            'return_date' => $this->integer(),
            'max_budget' => $this->money(),
            'adults' => $this->integer(),
            'childrens' => $this->integer(),
            'departure_location' => $this->string()->defaultValue(NULL),
            'favourit_destinations' => $this->text()->defaultValue(NULL),
            'comment' => $this->text()->defaultValue(NULL),
            'status' => $this->integer(),
        ], "ENGINE=InnoDB");
        $this->addForeignKey('fk_preference_user', "preference", "user_id", "user", "id", "CASCADE", "CASCADE");
        $this->execute("ALTER TABLE preference ADD FULLTEXT INDEX departure_location_index (departure_location ASC)");
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropForeignKey("fk_preference_user", "preference");
        $this->dropTable("preference");
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180117_143741_create_table_preference cannot be reverted.\n";

        return false;
    }
    */
}
