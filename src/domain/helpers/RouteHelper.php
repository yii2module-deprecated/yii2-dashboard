<?php

namespace yii2module\dashboard\domain\helpers;

use Yii;
use yii\helpers\ArrayHelper;
use yii2lab\misc\enums\HttpMethodEnum;

class RouteHelper
{

    public static function allRoutes() {
        $all = self::allFromRestClient();
        if(empty($all)) {
            $all = self::allFromRoutes();
        }
        return $all;
    }

    public static function allFromRestClient() {

        $collection = Yii::$app->db->createCommand('
SELECT endpoint, method, request
FROM rest 
WHERE  (module_id = "rest-'.API_VERSION_STRING.'" AND favorited_at > 0)
ORDER BY endpoint')->queryAll();
        $list = [];
        foreach ($collection as $favorite) {
            $favorite['request'] = unserialize($favorite['request']);
            $group = self::getGroup($favorite['endpoint']);
            $endpoint = strtoupper($favorite['method']) . SPC . $favorite['endpoint'];
            $data = null;
            if($favorite['method'] == 'post' && !empty($favorite['request']['bodyKeys'])) {
                $data = array_combine($favorite['request']['bodyKeys'], $favorite['request']['bodyValues']);
            }
            if($favorite['method'] == 'get' && !empty($favorite['request']['queryKeys'])) {
                $data = array_combine($favorite['request']['queryKeys'], $favorite['request']['queryValues']);
            }
            $list[$group][$endpoint] = $data;
        }
        return $list;
    }

    private static function getGroup($url, $index = 0) {
        return explode(SL, $url)[$index];
    }

    public static function allFromRoutes() {
        $list = [];
        foreach (Yii::$app->urlManager->rules as $rule) {
            if($rule instanceof yii\web\UrlRule) {
                /** @var yii\web\UrlRule $rule */
                if($rule->name != API_VERSION_STRING) {
                    $method = ArrayHelper::toArray($rule->verb);
                    $method = implode(',', $method);
                    $method = !empty($method) ? $method : 'GET';
                    $url = str_replace(API_VERSION_STRING . SL, EMP, $rule->name);
                    $group = self::getGroup($url);
                    $endpoint = $method . SPC . $url;
                    $list[$group][$endpoint] = null;
                }
            } elseif($rule instanceof yii\rest\UrlRule) {
                /** @var yii\rest\UrlRule $rule */
                foreach ($rule->controller as $url => $v) {
                    $url = str_replace(API_VERSION_STRING . SL, EMP, $url);
                    foreach ($rule->patterns as $pk => $pv) {
                        $arr = explode(SPC, $pk);
                        $method = trim($arr[0]);
                        if(!empty($method) && HttpMethodEnum::isValidSet(explode(',', $method))) {
                            $group = self::getGroup($url);
                            $endpoint = $method . SPC . $url . (!empty($arr[1]) ? SL . $arr[1] : EMP);
                            $list[$group][$endpoint] = null;
                        }
                    }
                }
            }
        }
        return $list;
    }
}
