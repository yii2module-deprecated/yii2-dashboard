<?php

namespace yii2module\dashboard\api;

use yii\base\Module as YiiModule;
use yii2lab\domain\helpers\DomainHelper;

class Module extends YiiModule
{
	
	public function init() {
		DomainHelper::forgeDomains([
			'dashboard' => 'yii2module\dashboard\domain\Domain',
		]);
		parent::init();
	}
	
}
