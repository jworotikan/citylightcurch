<?php

use Aws\S3\S3Client;

$autoload = '../vendor/autoload.php';

require $autoload;
$config = require('plugins/uploads3/config.php');

//s3
$s3 = S3Client::factory([
	'key' => $config['s3']['key'],
	'secret' => $config['s3']['secret']
]);

?>