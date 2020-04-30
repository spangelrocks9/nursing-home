<?php

define('APP_BASE', '/nursing-home');
define('APP_HOST', 'localhost');
define('APP_DB', 'nhfm');
define('APP_DB_USER', 'root');
define('APP_DB_PWD', '');
Yii::setAlias('@site', 'http://localhost' . APP_BASE);
Yii::setAlias('@uploadUrl', 'http://localhost' . APP_BASE . '/storage');

define('APP', 'Nursing Home');
define('APP_BACKEND', APP_BASE . '/admin');
define('APP_BACKEND_ID', 'nhfm-back');

Yii::setAlias('@common', dirname(__DIR__));
Yii::setAlias('@backend', dirname(dirname(__DIR__)) . '/backend');
Yii::setAlias('@storage', dirname(dirname(__DIR__)) . '/storage');
