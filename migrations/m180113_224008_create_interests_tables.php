<?php

use yii\db\Migration;

/**
 * Class m180113_224008_create_interests_tables
 */
class m180113_224008_create_interests_tables extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable("airline", [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
        ], "ENGINE=InnoDB");
        
        $this->createTable("climate", [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
        ], "ENGINE=InnoDB");
        
        $this->createTable("activity", [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
        ], "ENGINE=InnoDB");
        
        $this->createTable("accommodation_feature", [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
        ], "ENGINE=InnoDB");

    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropTable("airline");
        $this->dropTable("climate");
        $this->dropTable("activity");
        $this->dropTable("accommodation_feature");
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180113_224008_create_interests_tables cannot be reverted.\n";

        return false;
    }
    */
}
