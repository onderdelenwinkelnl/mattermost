<?php

use Fiyo\Mattermost\Client;
use Fiyo\Mattermost\Entity\Channel;
use Fiyo\Mattermost\Request\Channel\CreateChannelRequest;
use Fiyo\Mattermost\Session;

require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..'  . DIRECTORY_SEPARATOR . 'vendor/autoload.php';

$username = '';
$password = '';
$uri = '';

$teamId = '';
$name = ''; // lowercase alphanumeric
$displayName = '';
$purpose = '';
$header = '';
$type = ''; // Channel::TYPE_PUBLIC | Channel::TYPE_PRIVATE;


$session = (new Session())
    ->fromLogin($username, $password);

$client = new Client($session, $uri);


$channel = new Channel();
$channel->setTeamId($teamId);
$channel->setName($name);
$channel->setDisplayName($displayName);
$channel->setType($type);

$channel->setPurpose($purpose); // Optional
$channel->setHeader($header); // Optional

$request = new CreateChannelRequest($channel);
$channel = $client->request($request);