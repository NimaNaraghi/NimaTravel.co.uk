<?php

use yii\db\Migration;

/**
 * Class m180117_183001_create_junction_tables
 */
class m180117_183001_create_junction_tables extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
       
        $this->createTable("preference_climate", [
            'preference_id' => $this->integer()->notNull(),
            'climate_id' => $this->integer()->notNull(),
        ], "ENGINE=InnoDB");
        $this->addPrimaryKey('preference_climate_pk', 'preference_climate', ['preference_id', 'climate_id']);
        $this->addForeignKey("preference_climate_preference_fk", "preference_climate", "preference_id", "preference", "id", "CASCADE", "CASCADE");
        $this->addForeignKey("preference_climate_climate_fk", "preference_climate", "climate_id", "climate", "id", "CASCADE", "CASCADE");
        
        
        $this->createTable("preference_activity", [
            'preference_id' => $this->integer()->notNull(),
            'activity_id' => $this->integer()->notNull(),
        ], "ENGINE=InnoDB");
        $this->addPrimaryKey('preference_activity_pk', 'preference_activity', ['preference_id', 'activity_id']);
        $this->addForeignKey("preference_activity_preference_fk", "preference_activity", "preference_id", "preference", "id", "CASCADE", "CASCADE");
        $this->addForeignKey("preference_activity_activity_fk", "preference_activity", "activity_id", "activity", "id", "CASCADE", "CASCADE");

        $this->createTable("preference_accommodation_feature", [
            'preference_id' => $this->integer()->notNull(),
            'accommodation_feature_id' => $this->integer()->notNull(),
        ], "ENGINE=InnoDB");
        $this->addPrimaryKey('preference_accommodation_feature_pk', 'preference_accommodation_feature', ['preference_id', 'accommodation_feature_id']);
        $this->addForeignKey("preference_accommodation_feature_preference_fk", "preference_accommodation_feature", "preference_id", "preference", "id", "CASCADE", "CASCADE");
        $this->addForeignKey("preference_accommodation_feature_accommodation_feature_fk", "preference_accommodation_feature", "accommodation_feature_id", "accommodation_feature", "id", "CASCADE", "CASCADE");

        $this->createTable("preference_accessibility", [
            'preference_id' => $this->integer()->notNull(),
            'accessibility_id' => $this->integer()->notNull(),
        ], "ENGINE=InnoDB");
        $this->addPrimaryKey('preference_accessibility_pk', 'preference_accessibility', ['preference_id', 'accessibility_id']);
        $this->addForeignKey("preference_accessibility_preference_fk", "preference_accessibility", "preference_id", "preference", "id", "CASCADE", "CASCADE");
        $this->addForeignKey("preference_accessibility_accessibility_fk", "preference_accessibility", "accessibility_id", "accessibility", "id", "CASCADE", "CASCADE");

        $this->createTable("preference_accommodation_type", [
            'preference_id' => $this->integer()->notNull(),
            'accommodation_type_id' => $this->integer()->notNull(),
        ], "ENGINE=InnoDB");
        $this->addPrimaryKey('preference_accommodation_type_pk', 'preference_accommodation_type', ['preference_id', 'accommodation_type_id']);
        $this->addForeignKey("preference_accommodation_type_preference_fk", "preference_accommodation_type", "preference_id", "preference", "id", "CASCADE", "CASCADE");
        $this->addForeignKey("preference_accommodation_type_accommodation_type_fk", "preference_accommodation_type", "accommodation_type_id", "accommodation_type", "id", "CASCADE", "CASCADE");

        $this->createTable("preference_board_basis", [
            'preference_id' => $this->integer()->notNull(),
            'board_basis_id' => $this->integer()->notNull(),
        ], "ENGINE=InnoDB");
        $this->addPrimaryKey('preference_board_basis_pk', 'preference_board_basis', ['preference_id', 'board_basis_id']);
        $this->addForeignKey("preference_board_basis_preference_fk", "preference_board_basis", "preference_id", "preference", "id", "CASCADE", "CASCADE");
        $this->addForeignKey("preference_board_basis_board_basis_fk", "preference_board_basis", "board_basis_id", "board_basis", "id", "CASCADE", "CASCADE");

        $this->createTable("preference_style", [
            'preference_id' => $this->integer()->notNull(),
            'style_id' => $this->integer()->notNull(),
        ], "ENGINE=InnoDB");
        $this->addPrimaryKey('preference_style_pk', 'preference_style', ['preference_id', 'style_id']);
        $this->addForeignKey("preference_style_preference_fk", "preference_style", "preference_id", "preference", "id", "CASCADE", "CASCADE");
        $this->addForeignKey("preference_style_style_fk", "preference_style", "style_id", "style", "id", "CASCADE", "CASCADE");

        $this->createTable("preference_video", [
            'preference_id' => $this->integer()->notNull(),
            'video_id' => $this->integer()->notNull(),
        ], "ENGINE=InnoDB");
        $this->addPrimaryKey('preference_video_pk', 'preference_video', ['preference_id', 'video_id']);
        $this->addForeignKey("preference_video_preference_fk", "preference_video", "preference_id", "preference", "id", "CASCADE", "CASCADE");
        $this->addForeignKey("preference_video_video_fk", "preference_video", "video_id", "video", "id", "CASCADE", "CASCADE");
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropForeignKey("preference_climate_preference_fk", "preference_climate");
        $this->dropForeignKey("preference_climate_climate_fk", "preference_climate");
        $this->dropTable("preference_climate");
        
        $this->dropForeignKey("preference_activity_preference_fk", "preference_activity");
        $this->dropForeignKey("preference_activity_preference_fk", "preference_activity");
        $this->dropTable("preference_activity");
        
        $this->dropForeignKey("preference_accommodation_feature_preference_fk", "preference_accommodation_feature");
        $this->dropForeignKey("preference_accommodation_feature_accommodation_feature_fk", "preference_accommodation_feature");
        $this->dropTable("preference_accommodation_feature");
        
        $this->dropForeignKey("preference_accessibility_preference_fk", "preference_accessibility");
        $this->dropForeignKey("preference_accessibility_accessibility_fk", "preference_accessibility");
        $this->dropTable("preference_accessibility");
        
        $this->dropForeignKey("preference_board_basis_preference_fk", "preference_board_basis");
        $this->dropForeignKey("preference_board_basis_board_basis_fk", "preference_board_basis");
        $this->dropTable("preference_board_basis");
        
        $this->dropForeignKey("preference_style_preference_fk", "preference_style");
        $this->dropForeignKey("preference_style_style_fk", "preference_style");
        $this->dropTable("preference_style");
        
        $this->dropForeignKey("preference_video_preference_fk", "preference_video");
        $this->dropForeignKey("preference_video_video_fk", "preference_video");
        $this->dropTable("preference_video");
        
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180117_183001_create_junction_tables cannot be reverted.\n";

        return false;
    }
    */
}
