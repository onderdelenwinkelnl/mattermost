<?php

use Fiyo\Mattermost\Client;
use Fiyo\Mattermost\Entity\Channel;
use Fiyo\Mattermost\Request\Channel\ConvertPublicToPrivateChannelRequest;
use Fiyo\Mattermost\Session;

require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..'  . DIRECTORY_SEPARATOR . 'vendor/autoload.php';

$username = '';
$password = '';
$uri = '';

$channelId = '';


$session = (new Session())
    ->fromLogin($username, $password);

$client = new Client($session, $uri);


$request = new ConvertPublicToPrivateChannelRequest($channelId);

/** @var Channel $channel */
$channel = $client->request($request);