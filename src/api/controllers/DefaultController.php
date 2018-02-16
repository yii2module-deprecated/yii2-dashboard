<?php

namespace yii2module\dashboard\api\controllers;

use Yii;
use yii\rest\Controller;
use yii2module\dashboard\domain\helpers\RouteHelper;

class DefaultController extends Controller
{
	
	public function actionIndex() {
	    return [
	        'title' => Yii::t('dashboard/main', 'title'),
            'header' => Yii::t('dashboard/main', 'hello'),
            'text' => Yii::t('dashboard/main', 'text'),
        ];
    }

    public function actionDoc($from = null) {
        return RouteHelper::allRoutes($from);
    }

}
