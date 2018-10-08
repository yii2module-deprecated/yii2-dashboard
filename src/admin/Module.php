<?php

namespace yii2module\dashboard\admin;
use yii2lab\applicationTemplate\common\enums\ApplicationPermissionEnum;
use yii2lab\extension\web\helpers\Behavior;

/**
 * Class Module
 * 
 * @package yii2module\dashboard\admin
 */
class Module extends \yii\base\Module {

	public $log;

    public function behaviors()
    {
        return [
            'access' => Behavior::access(ApplicationPermissionEnum::BACKEND_ALL),
        ];
    }

}