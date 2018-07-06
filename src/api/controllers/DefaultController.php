<?php

namespace yii2module\dashboard\api\controllers;

use Yii;
use yii\rest\Controller;
use yii2lab\rest\domain\helpers\MiscHelper;

class DefaultController extends Controller
{
	
	public function actionIndex() {
	    $data = [
		    'title' => Yii::t('dashboard/main', 'title'),
		    'header' => Yii::t('dashboard/main', 'hello'),
		    'text' => Yii::t('dashboard/main', 'text'),
	    ];
		$data['text'] .= PHP_EOL . 'Для просмотра документации API переидите по ссылке: ' . MiscHelper::forgeApiUrl('doc/html');
		return $data;
    }

}
