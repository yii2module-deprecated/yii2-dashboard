<?php

namespace yii2module\dashboard\web\controllers;

use yii\web\Controller;

class DefaultController extends Controller
{
	
	public function actionIndex()
	{
		return $this->render('index');
	}

}
