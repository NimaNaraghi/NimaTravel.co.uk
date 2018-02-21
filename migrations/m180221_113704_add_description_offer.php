<?php

use yii\db\Migration;

/**
 * Class m180221_113704_add_description_offer
 */
class m180221_113704_add_description_offer extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->addColumn('offer', 'description', $this->text()->defaultValue(NULL));
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropColumn('offer', 'description');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180221_113704_add_description_offer cannot be reverted.\n";

        return false;
    }
    */
}
