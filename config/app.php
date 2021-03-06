<?php 

$db = require __DIR__ . '/database.php';
if(env('DB_CONN', 'sqlite') == 'sqlite') {
	if (!file_exists(__DIR__ . '/../storage/database.sqlite')) {
		$dbsqlite = fopen(__DIR__ . '/../storage/database.sqlite', 'w');
		fwrite($dbsqlite, '');
		fclose($dbsqlite);
	}
}

return [
	'settings' => [
		'determineRouteBeforeAppMiddleware' => true,
		'displayErrorDetails' => env('APP_DEBUG'),
		'db' => $db[env('DB_CONN', 'sqlite')],
		'logger' => [
			'name' =>env('APP_NAME', 'Slim Framework'),
			'path' => __DIR__ . '/../storage/logs/app.log',
			'level' => Monolog\Logger::DEBUG,
		],
	],
];

