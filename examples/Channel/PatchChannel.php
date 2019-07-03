<?php

use Fiyo\Mattermost\Client;
use Fiyo\Mattermost\Entity\Channel;
use Fiyo\Mattermost\Request\Channel\PatchChannelRequest;
use Fiyo\Mattermost\Session;

require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..'  . DIRECTORY_SEPARATOR . 'vendor/autoload.php';

$username = '';
$password = '';
$uri = '';

$channelId = '';
$name = '';
$displayName = '';
$header = '';
$purpose = '';

$session = (new Session())
    ->fromLogin($username, $password);

$client = new Client($session, $uri);


$channel = new Channel();
$channel->setId($channelId);
$channel->setName($name); // Optional
$channel->setDisplayName($displayName); // Optional
$channel->setPurpose($purpose); // Optional
$channel->setHeader($header); // Optional

$request = new PatchChannelRequest($channel);

$client->request($request);