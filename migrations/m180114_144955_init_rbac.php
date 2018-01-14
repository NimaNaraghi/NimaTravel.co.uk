<?php

use yii\db\Migration;

/**
 * Class m180114_144955_init_rbac
 */
class m180114_144955_init_rbac extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $auth = Yii::$app->authManager;
        
        $updateAccount = $auth->createPermission('updateAccount');
        $updateAccount->description = 'Update account and profile';
        $auth->add($updateAccount);
        
        //add tourist role
        $tourist = $auth->createRole('tourist');
        $auth->add($tourist);
        
        
        //add admin role
        $admin = $auth->createRole('admin');
        $auth->add($admin);
        
        // add the rule
        $rule = new \app\rbac\TouristAuthRule;
        $auth->add($rule);

        // add the "updateOwnAccount" permission and associate the rule with it.
        $updateOwnAccount = $auth->createPermission('updateOwnAccount');
        $updateOwnAccount->description = 'Update own account';
        $updateOwnAccount->ruleName = $rule->name;
        $auth->add($updateOwnAccount);

        // "updateOwnPost" will be used from "updateAccount"
        $auth->addChild($updateOwnAccount, $updateAccount);

        // allow "client" to update their own account
        $auth->addChild($tourist, $updateOwnAccount);
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $auth = Yii::$app->authManager;

        $auth->removeAll();
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180114_144955_init_rbac cannot be reverted.\n";

        return false;
    }
    */
}
