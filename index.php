<?php

require_once 'vendor/autoload.php';
include_once "credentials";
use mahmad\JiraGovernace\Jira;

use CliArgs\CliArgs;
$config=[
	'user'=>$user,
	'pass'=>$pass,
	'version'=> 'none'];

$CliArgs = new CliArgs(
[
	'rebuild' => [
		'default' => 0,
	],
	'version' => [
		'default' => 'none',
	]
]);
$config['rebuild'] =  $CliArgs->getArg('rebuild'); 
$config['version'] = $CliArgs->getArg('version'); 

if($config['version'] == 'none')
{
	echo "Version name is missing\n";
	exit();
}
new Jira($config);

//echo $greeting->greet("Hello Composer");
