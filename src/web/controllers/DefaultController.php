<?php

namespace yii2module\dashboard\web\controllers;

use yii\web\Controller;
use yii2lab\domain\data\Query;

class DefaultController extends Controller
{
	
	public function actionIndex()
	{
		return $this->render('index');
	}

}
