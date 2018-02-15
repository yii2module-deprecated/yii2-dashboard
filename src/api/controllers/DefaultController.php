<?php

namespace yii2module\dashboard\api\controllers;

use yii\rest\Controller;
use yii2module\dashboard\api\helpers\RouteHelper;

class DefaultController extends Controller
{
	
	public function actionIndex() {
	    return RouteHelper::allRoutes();
    }

}
