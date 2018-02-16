<?php

namespace yii2module\dashboard\domain\helpers;

use Yii;
use yii\web\UrlRule;

class RouteHelper
{

    public static function allRoutes() {
        $list = [];
        foreach (Yii::$app->urlManager->rules as $rule) {
            /** @var UrlRule $rule */
            if(property_exists($rule, 'name')) {
                if($rule->name != API_VERSION_STRING) {
                    $list[] = $rule->name;
                }
            } elseif(property_exists($rule, 'controller')) {
                foreach ($rule->controller as $k => $v) {
                    $list[] = $k;
                }
            }
        }
        $list = array_unique($list);
        $list = array_values($list);
        sort($list);
        return $list;
    }
	
}
