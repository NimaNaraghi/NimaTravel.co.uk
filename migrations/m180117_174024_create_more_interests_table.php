<?php

use yii\db\Migration;

/**
 * Handles the creation of table `more_interests`.
 */
class m180117_174024_create_more_interests_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('accessibility', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
        ],"ENGINE=InnoDb");
        
        $this->createTable('accommodation_type', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
        ],"ENGINE=InnoDb");
        
        $this->createTable('board_basis', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
        ],"ENGINE=InnoDb");
        
        $this->createTable('style', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
        ],"ENGINE=InnoDb");
        
        $this->createTable('video', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'link' => $this->string()->notNull(),
        ],"ENGINE=InnoDb");
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('accessibility');
        $this->dropTable('accommodation_type');
        $this->dropTable('board_basis');
        $this->dropTable('style');
    }
}
