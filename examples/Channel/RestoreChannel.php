<?php

use Fiyo\Mattermost\Client;
use Fiyo\Mattermost\Entity\Channel;
use Fiyo\Mattermost\Request\Channel\RestoreChannelRequest;
use Fiyo\Mattermost\Session;

require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..'  . DIRECTORY_SEPARATOR . 'vendor/autoload.php';

$username = '';
$password = '';
$uri = '';

$channelId = '';

$session = (new Session())
    ->fromLogin($username, $password);

$client = new Client($session, $uri);

$channelRequest = new RestoreChannelRequest($channelId);

/** @var Channel $channel */
$channel = $client->request($channelRequest);