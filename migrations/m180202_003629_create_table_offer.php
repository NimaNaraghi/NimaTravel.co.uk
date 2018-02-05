<?php

use yii\db\Migration;

/**
 * Class m180202_003629_create_table_offer
 */
class m180202_003629_create_table_offer extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable("offer", [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'board_basis_id' => $this->integer()->defaultValue(NULL),
            'preference_id' => $this->integer()->notNull(),
            'title' => $this->string()->notNull(),
            'price' => $this->money()->notNull(),
            'location' => $this->string()->defaultValue(NULL),
            'longitude' => $this->double()->defaultValue(NULL),
            'latitude' => $this->double()->defaultValue(NULL),
            'departure_date' => $this->integer()->notNull(),
            'return_date' => $this->integer()->notNull(),
            'transfer' => $this->string()->defaultValue(NULL),
            'return_transfer' => $this->string()->defaultValue(NULL),
            'luggage_allowance' => $this->string(),
            'out_link' => $this->string()->defaultValue(NULL),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'status' => $this->integer(),
        ], "ENGINE=InnoDB");
 
        $this->addForeignKey("fk_offer_user", "offer", "user_id", "user", "id", "CASCADE", "CASCADE");
        $this->addForeignKey("fk_offer_preference", "offer", "preference_id", "preference", "id", "CASCADE", "CASCADE");
        $this->addForeignKey("fk_offer_board_basis", "offer", "board_basis_id", "board_basis", "id", "RESTRICT", "CASCADE");
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropForeignKey("fk_offer_user", "offer");
        $this->dropForeignKey("fk_offer_preference", "offer");
        $this->dropForeignKey("fk_offer_board_basis", "offer");
        $this->dropTable("offer");
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180202_003629_create_table_offer cannot be reverted.\n";

        return false;
    }
    */
}
