<?php
namespace app\rbac;

use yii\rbac\Rule;


/**
 * Checks if user ID matches user passed via params
 */
class TouristAuthRule extends Rule
{
    public $name = 'isAccountOwner';

    /**
     * @param string|int $user the user ID.
     * @param Item $item the role or permission that this rule is associated with
     * @param array $params parameters passed to ManagerInterface::checkAccess().
     * @return bool a value indicating whether the rule permits the role or permission it is associated with.
     */
    public function execute($user, $item, $params)
    {
        return isset($params['user_id']) ? $params['user_id'] == $user->id : false;
    }
}

?>