<?php

use Fiyo\Mattermost\Client;
use Fiyo\Mattermost\Entity\Team;
use Fiyo\Mattermost\Request\Team\GetTeamsRequest;
use Fiyo\Mattermost\Session;

require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..'  . DIRECTORY_SEPARATOR . 'vendor/autoload.php';

$username = '';
$password = '';
$uri = '';

$session = (new Session())
    ->fromLogin($username, $password);

$client = new Client($session, $uri);

$teamsRequest = new GetTeamsRequest();
$teamsRequest->setLimit(1); // Optional
$teamsRequest->setPage(0); // Optional

/** @var Team[] $teams */
$teams = $client->request($teamsRequest);