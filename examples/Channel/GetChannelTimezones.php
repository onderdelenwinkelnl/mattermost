<?php

use Fiyo\Mattermost\Client;
use Fiyo\Mattermost\Request\Channel\GetChannelTimezonesRequest;
use Fiyo\Mattermost\Session;

require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..'  . DIRECTORY_SEPARATOR . 'vendor/autoload.php';

$username = '';
$password = '';
$uri = '';

$channelId = '';

$session = (new Session())
    ->fromLogin($username, $password);

$client = new Client($session, $uri);

$channelRequest = new GetChannelTimezonesRequest($channelId);

/** @var array|string[] $timeZones */
$timeZones = $client->request($channelRequest);