<?php

require_once 'vendor/autoload.php';
include_once "credentials";
use mahmad\JiraGovernace\Jira;

use CliArgs\CliArgs;



$CliArgs = new CliArgs(
[
	'rebuild' => [
		'default' => 0,
	],
	'version' => [
		'default' => 'none',
	],
	'server' => [
		'default' => 'mentor',
	]
]);

if($CliArgs->getArg('version') == 'none')
{
	echo "Version name is missing\n";
	exit();
}

if(($CliArgs->getArg('server') == 'mentor')&&($CliArgs->getArg('server') == 'atlassian'))
{
	echo "Invalid server name [mentor|atlassian]\n";
	exit();
}
if($CliArgs->getArg('server') == 'mentor')
{
	$config_mentor['rebuild'] =  $CliArgs->getArg('rebuild'); 
	$config_mentor['version'] = $CliArgs->getArg('version'); 
	new Jira($config_mentor);
}
else
{
	$config_atlassian['rebuild'] =  $CliArgs->getArg('rebuild'); 
	$config_atlassian['version'] = $CliArgs->getArg('version'); 
	new Jira($config_atlassian);
}

//echo $greeting->greet("Hello Composer");
