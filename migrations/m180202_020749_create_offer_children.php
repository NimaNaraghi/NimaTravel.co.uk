<?php

use yii\db\Migration;

/**
 * Class m180202_020749_create_offer_children
 */
class m180202_020749_create_offer_children extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable("offer_image",[
            'id' => $this->primaryKey(),
            'offer_id' => $this->integer()->notNull(),
            'title' => $this->string()->defaultValue(NULL),
        ],'ENGINE=InnoDB');
        
        $this->createTable('room',[
            'id' => $this->primaryKey(),
            'offer_id' => $this->integer()->notNull(),
            'title' => $this->string()->notNull(),
        ],'ENGINE=InnoDB');
        
        $this->createTable('things_to_do', [
            'id' => $this->primaryKey(),
            'offer_id' => $this->integer()->notNull(),
            'title' => $this->string()->notNull(),
            'highlights' => $this->text()->defaultValue(NULL),
            'description' => $this->text()->defaultValue(NULL),
            'price' => $this->money(),
            'begin_date' => $this->integer(),
            'end_date' => $this->integer(),
        ],'ENGINE=InnoDB');
        
        $this->addForeignKey("fk_offer_image_offer", "offer_image", "offer_id", "offer", "id", "CASCADE", "CASCADE");
        $this->addForeignKey("fk_room_offer", "room", "offer_id", "offer", "id", "CASCADE", "CASCADE");
        $this->addForeignKey("fk_things_to_do_offer", "things_to_do", "offer_id", "offer", "id", "CASCADE", "CASCADE");

    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropForeignKey("fk_offer_image_offer", "offer_image");
        $this->dropForeignKey("fk_room_offer", "room");
        $this->dropForeignKey("fk_things_to_do_offer", "things_to_do");
        
        $this->dropTable("offer_image");
        $this->dropTable("room");
        $this->dropTable("things_to_do");
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180202_020749_create_offer_children cannot be reverted.\n";

        return false;
    }
    */
}
