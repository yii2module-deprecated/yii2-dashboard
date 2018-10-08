<?php

namespace yii2module\dashboard\web\controllers;

use yii\web\Controller;
use yii2lab\domain\data\Query;

class DefaultController extends Controller
{
	
	public function actionIndex()
	{
		/*$query = Query::forge();
		$query->page(2);
		$query->limit(10);
		//$query->perPage(10);l
		//$dataProvider = \App::$domain->history->transaction->getDataProvider($query);
		//prr($dataProvider->getPagination()->offset,1,1);
		
		$collection = \App::$domain->history->transaction->oneById(50032158);
		prr($collection,1,1);*/
		
		return $this->render('index');
	}

}
