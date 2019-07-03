<?php

use Fiyo\Mattermost\Client;
use Fiyo\Mattermost\Entity\Channel;
use Fiyo\Mattermost\Request\Channel\CreateChannelRequest;
use Fiyo\Mattermost\Request\Channel\GetChannelByIdRequest;
use Fiyo\Mattermost\Request\Channel\UpdateChannelRequest;
use Fiyo\Mattermost\Session;

require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..'  . DIRECTORY_SEPARATOR . 'vendor/autoload.php';

$username = '';
$password = '';
$uri = '';

$channelId = '';
$purpose = '';

$session = (new Session())
    ->fromLogin($username, $password);

$client = new Client($session, $uri);

$request = new GetChannelByIdRequest($channelId);

/** @var Channel $channel */
$channel = $client->request($request);
$channel->setPurpose($purpose);

$request = new UpdateChannelRequest($channel);
$client->request($request);