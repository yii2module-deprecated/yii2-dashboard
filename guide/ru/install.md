Установка
===

Устанавливаем зависимость:

```
composer require yii2module/yii2-dashboard
```

Создаем полномочие:

```
oExamlpe
```

Объявляем модуль:

```php
return [
	'modules' => [
		// ...
		'dashboard' => 'yii2module\dashboard\console\Module',
		// ...
	],
];
```

Объявляем домен:

```php
return [
	'components' => [
		// ...
		'dashboard' => [
			'class' => 'yii2lab\domain\Domain',
			'path' => 'yii2module\dashboard\domain',
			'repositories' => [
				'default',
			],
			'services' => [
				'default',
			],
		],
		// ...
	],
];
```
