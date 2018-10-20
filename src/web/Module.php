<?php

namespace yii2module\dashboard\web;

use yii2lab\domain\helpers\DomainHelper;

/**
 * Class Module
 * 
 * @package yii2module\dashboard\web
 */
class Module extends \yii\base\Module {
	
	public function init() {
		DomainHelper::forgeDomains([
			'dashboard' => 'yii2module\dashboard\domain\Domain',
		]);
		parent::init();
	}
	
}