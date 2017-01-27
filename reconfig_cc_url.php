#! /usr/bin/php
<?php

	if ($argc < 3) {
		die("Must be 2 agruments! \n 1 - Name file with full path, \n" .
			" 2 - Name file with full configuration Codeception \n" .
			" example:\n # reconfig_cc.php /var/autotest/live/url_file.txt /var/autotest/live/test/acceptance.suite.yml\n");
	}

	echo(">>> Checking and updating configuration...\n");

	$config_CC = $argv[2]; // файл с конфигурацией для изменения
	$file_URL = $argv[1]; // файл с URL для тестирования

	if (!file_exists($config_CC) && !file_exists($file_URL)) {
		echo "Files $config_CC or $file_URL not found";
		exit(2);
	}
	$new_Url = trim($file_URL);
	if ($new_Url) {
		$temp = file_get_contents($config_CC);
		$temp = preg_replace ('/url:.["\'].+[\'"]/i', "url: '$new_Url'" , $temp); //url:.["'].+['"]/i
		if (file_put_contents($config_CC, $temp) === FALSE) {
			echo "Something wrong, please check the permission access the file $config_CC\n";
			exit(3);
		}
	}
	echo("<<< Everything OK...\n");
